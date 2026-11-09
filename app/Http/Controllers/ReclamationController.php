<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReclamationRequest;
use App\Models\Reclamation;
use Illuminate\Http\JsonResponse;
use Throwable;

class ReclamationController extends Controller
{
    public function store(StoreReclamationRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $reclamation = Reclamation::create([
                'client_number' => $validated['clientNumber'] ?? null,
                'full_name'     => $validated['fullName'],
                'subject'       => $validated['subject'],
                'phone'         => $validated['phone'],
                'message'       => $validated['message'],
            ]);

            foreach ($request->file('files', []) as $file) {
                if ($file && $file->isValid()) {
                    $reclamation
                        ->addMedia($file)
                        ->toMediaCollection('attachments');
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Votre réclamation a été envoyée avec succès.',
            ], 201);
        } catch (Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => "Une erreur s'est produite. Veuillez réessayer.",
            ], 500);
        }
    }
}
