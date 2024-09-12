<!-- resources/views/upload-json.blade.php -->
<form action="{{ route('json') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="jsonFile">Choose JSON file:</label>
        <input type="file" name="jsonFile" id="jsonFile" accept="application/json">
    </div>
    <button type="submit">Upload</button>
</form>
