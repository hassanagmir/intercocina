<!-- resources/views/upload-json.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger" style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('json') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="jsonFile">Choose JSON file:</label>
        <input type="file" name="jsonFile" id="jsonFile" accept="application/json">
    </div>
    <button type="submit">Import</button>
</form>