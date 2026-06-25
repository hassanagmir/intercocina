<?php

namespace App\Http\Livewire;

use App\Models\Discount;
use App\Models\Family;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpOffice\PhpSpreadsheet\IOFactory;

new class extends Component
{
    use WithFileUploads;

    public $file;
    public $preview      = [];
    public $previewCount = 0;
    public $fileName     = '';
    public $importing    = false;
    public $results      = null;

    protected $rules = [
        'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
    ];

    public function updatedFile(): void
    {
        $this->validate();
        $this->loadPreview();
    }

    private function loadPreview(): void
    {
        try {
            $path           = $this->file->getRealPath();
            $this->fileName = $this->file->getClientOriginalName();
            $spreadsheet    = IOFactory::load($path);
            $rows           = $spreadsheet->getActiveSheet()->toArray(null, true, true, false);

            $data = array_filter(
                array_slice($rows, 1),
                fn($row) => !empty($row[0]) && !empty($row[1])
            );

            $this->previewCount = count($data);
            $this->preview      = array_slice(array_values($data), 0, 5);
        } catch (\Exception $e) {
            $this->addError('file', 'Could not read file: ' . $e->getMessage());
        }
    }

    public function import(): void
    {
        $this->validate();

        $this->importing = true;
        $this->results   = null;

        try {
            $path        = $this->file->getRealPath();
            $spreadsheet = IOFactory::load($path);
            $rows        = $spreadsheet->getActiveSheet()->toArray(null, true, true, false);
            $data        = array_slice($rows, 1);

            $stats = ['created' => 0, 'updated' => 0, 'skipped' => 0, 'errors' => []];

            foreach ($data as $index => $row) {
                $familyCode = trim($row[0] ?? '');
                $clientCode = trim($row[1] ?? '');
                $percentage = $row[2] ?? null;

                if (empty($familyCode) && empty($clientCode)) continue;

                if (empty($familyCode) || empty($clientCode) || $percentage === null) {
                    $stats['errors'][] = "Row " . ($index + 2) . ": missing required data";
                    $stats['skipped']++;
                    continue;
                }

                $user = User::where('code', $clientCode)->first();
                if (!$user) {
                    $stats['errors'][] = "Row " . ($index + 2) . ": client '$clientCode' not found";
                    $stats['skipped']++;
                    continue;
                }

                $family = Family::where('code', $familyCode)->first();
                if (!$family) {
                    $stats['errors'][] = "Row " . ($index + 2) . ": family '$familyCode' not found";
                    $stats['skipped']++;
                    continue;
                }

                $existing = Discount::where('user_id', $user->id)
                    ->where('family_id', $family->id)
                    ->first();

                if ($existing) {
                    $existing->update(['percentage' => (float) $percentage]);
                    $stats['updated']++;
                } else {
                    Discount::create([
                        'user_id'    => $user->id,
                        'family_id'  => $family->id,
                        'percentage' => (float) $percentage,
                    ]);
                    $stats['created']++;
                }
            }

            $this->results  = $stats;
            $this->file     = null;
            $this->preview  = [];
            $this->fileName = '';
        } catch (\Exception $e) {
            $this->addError('file', 'Import failed: ' . $e->getMessage());
        } finally {
            $this->importing = false;
        }
    }

    public function resetImport(): void
    {
        $this->file         = null;
        $this->preview      = [];
        $this->previewCount = 0;
        $this->fileName     = '';
        $this->results      = null;
        $this->resetErrorBag();
        $this->dispatch('close-modal', id: 'import-discount-modal');
    }
};
?>
<div>

    
{{-- ── Trigger button ── --}}
<x-filament::button
    icon="heroicon-m-arrow-up-tray"
    x-on:click="$dispatch('open-modal', { id: 'import-discount-modal' })"
>
    Import discounts
</x-filament::button>

{{-- ── Modal ── --}}
<x-filament::modal
    id="import-discount-modal"
    width="lg"
    x-on:close="$wire.resetImport()"
>
    <x-slot name="heading">Import discounts</x-slot>
    <x-slot name="description">
        Upload an Excel or CSV file with columns:
        <code class="font-mono text-xs">family_code · client_code · discount</code>
    </x-slot>

    {{-- ── Upload state ── --}}
    @if (!$preview && !$results)
        <div
            x-data="{ dragging: false }"
            x-on:dragover.prevent="dragging = true"
            x-on:dragleave.prevent="dragging = false"
            x-on:drop.prevent="dragging = false"
            :class="dragging
                ? 'border-primary-400 bg-primary-50 dark:bg-primary-950/20'
                : 'border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/5'"
            class="rounded-lg border-2 border-dashed p-8 text-center transition-colors duration-150"
        >
            <label for="file-upload" class="cursor-pointer flex flex-col items-center gap-2">
                <x-filament::icon
                    icon="heroicon-o-arrow-up-tray"
                    class="h-8 w-8 text-gray-400 dark:text-gray-500"
                />
                <span class="text-sm font-medium text-primary-600 dark:text-primary-400">
                    Click to upload
                </span>
                <span class="text-xs text-gray-500 dark:text-gray-400">or drag & drop</span>
                <span class="text-xs text-gray-400 dark:text-gray-500">.xlsx · .xls · .csv · max 10 MB</span>
            </label>
            <input
                id="file-upload"
                type="file"
                wire:model="file"
                accept=".xlsx,.xls,.csv"
                class="sr-only"
            />
        </div>

        @error('file')
            <p class="mt-2 flex items-center gap-1.5 text-sm text-danger-600 dark:text-danger-400">
                <x-filament::icon icon="heroicon-m-exclamation-circle" class="h-4 w-4 shrink-0" />
                {{ $message }}
            </p>
        @enderror

        <div wire:loading wire:target="file" class="mt-3 flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
            <x-filament::loading-indicator class="h-4 w-4" />
            Reading file…
        </div>
    @endif

    {{-- ── Preview state ── --}}
    @if (!empty($preview) && !$results)
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-o-document-text" class="h-5 w-5 text-success-500" />
                    <span class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ $fileName }}
                    </span>
                    <span class="text-xs text-gray-400 dark:text-gray-500">
                        · {{ $previewCount }} {{ Str::plural('row', $previewCount) }}
                    </span>
                </div>
                <button
                    wire:click="resetImport"
                    type="button"
                    class="rounded-md p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-white/10 dark:hover:text-gray-300 transition-colors"
                    aria-label="Remove file"
                >
                    <x-filament::icon icon="heroicon-m-x-mark" class="h-4 w-4" />
                </button>
            </div>

            <div class="overflow-hidden rounded-lg ring-1 ring-gray-950/5 dark:ring-white/10">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 dark:bg-white/5">
                        <tr>
                            <th class="px-4 py-2.5 text-left text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Family code</th>
                            <th class="px-4 py-2.5 text-left text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Client code</th>
                            <th class="px-4 py-2.5 text-left text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Discount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-white/5 bg-white dark:bg-gray-900">
                        @foreach ($preview as $row)
                            <tr>
                                <td class="px-4 py-2.5 font-mono text-xs text-gray-700 dark:text-gray-300">{{ $row[0] }}</td>
                                <td class="px-4 py-2.5 font-mono text-xs text-gray-700 dark:text-gray-300">{{ $row[1] }}</td>
                                <td class="px-4 py-2.5">
                                    <span class="inline-flex items-center rounded-full bg-success-50 px-2 py-0.5 text-xs font-medium text-success-700 dark:bg-success-950/40 dark:text-success-400">
                                        {{ number_format((float) $row[2], 2) }}%
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($previewCount > 5)
                    <div class="border-t border-gray-100 dark:border-white/5 bg-gray-50 dark:bg-white/5 px-4 py-2 text-xs text-gray-400 dark:text-gray-500">
                        Showing 5 of {{ $previewCount }} rows
                    </div>
                @endif
            </div>

            @error('file')
                <p class="flex items-center gap-1.5 text-sm text-danger-600 dark:text-danger-400">
                    <x-filament::icon icon="heroicon-m-exclamation-circle" class="h-4 w-4 shrink-0" />
                    {{ $message }}
                </p>
            @enderror
        </div>
    @endif

    {{-- ── Results state ── --}}
    @if ($results)
        <div class="space-y-4">
            <div class="flex items-center gap-2">
                <x-filament::icon icon="heroicon-o-check-circle" class="h-5 w-5 text-success-500" />
                <span class="text-sm font-medium text-gray-900 dark:text-white">Import complete</span>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <div class="rounded-lg bg-success-50 dark:bg-success-950/30 p-3 text-center">
                    <p class="text-2xl font-semibold text-success-700 dark:text-success-400">{{ $results['created'] }}</p>
                    <p class="mt-0.5 text-xs text-success-600 dark:text-success-500">Created</p>
                </div>
                <div class="rounded-lg bg-info-50 dark:bg-info-950/30 p-3 text-center">
                    <p class="text-2xl font-semibold text-info-700 dark:text-info-400">{{ $results['updated'] }}</p>
                    <p class="mt-0.5 text-xs text-info-600 dark:text-info-500">Updated</p>
                </div>
                <div class="rounded-lg bg-warning-50 dark:bg-warning-950/30 p-3 text-center">
                    <p class="text-2xl font-semibold text-warning-700 dark:text-warning-400">{{ $results['skipped'] }}</p>
                    <p class="mt-0.5 text-xs text-warning-600 dark:text-warning-500">Skipped</p>
                </div>
            </div>

            @if (!empty($results['errors']))
                <div class="rounded-lg bg-danger-50 dark:bg-danger-950/30 p-3 space-y-1">
                    <p class="flex items-center gap-1.5 text-xs font-medium text-danger-700 dark:text-danger-400">
                        <x-filament::icon icon="heroicon-m-exclamation-triangle" class="h-4 w-4 shrink-0" />
                        {{ count($results['errors']) }} {{ Str::plural('row', count($results['errors'])) }} had issues
                    </p>
                    <ul class="max-h-36 overflow-y-auto space-y-0.5">
                        @foreach ($results['errors'] as $error)
                            <li class="text-xs text-danger-600 dark:text-danger-400">· {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endif

    {{-- ── Modal footer ── --}}
    <x-slot name="footerActions">
        @if (!$preview && !$results)
            <x-filament::button color="gray" x-on:click="$dispatch('close-modal', { id: 'import-discount-modal' })">
                Cancel
            </x-filament::button>
        @endif

        @if (!empty($preview) && !$results)
            <x-filament::button
                wire:click="import"
                wire:loading.attr="disabled"
                wire:target="import"
                icon="heroicon-m-cloud-arrow-up"
            >
                <span wire:loading.remove wire:target="import">Import</span>
                <span wire:loading wire:target="import" class="flex items-center gap-1.5">
                    <x-filament::loading-indicator class="h-4 w-4" />
                    Importing…
                </span>
            </x-filament::button>
            <x-filament::button color="gray" wire:click="resetImport">
                Cancel
            </x-filament::button>
        @endif

        @if ($results)
            <x-filament::button
                wire:click="resetImport"
                color="gray"
                icon="heroicon-m-arrow-up-tray"
            >
                Import another file
            </x-filament::button>
            <x-filament::button
                x-on:click="$dispatch('close-modal', { id: 'import-discount-modal' })"
            >
                Done
            </x-filament::button>
        @endif
    </x-slot>
</x-filament::modal>
</div>