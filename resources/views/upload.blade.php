<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload (Single + Multiple)</title>
</head>
<body>
    <h1>Single Image Upload</h1>
    <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h1>Multiple Images Upload</h1>
    <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Uploaded Images</h2>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($photos as $photo)
            <div style="text-align: center;">
                <img src="{{ asset('images/' . $photo->image) }}" width="200" height="auto" style="border: 1px solid #ccc;">
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="margin-top: 5px;">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    <div style="margin-top: 20px;">
        {{ $photos->links() }}
        <p>Showing {{ $photos->firstItem() }} to {{ $photos->lastItem() }} of {{ $photos->total() }} results</p>
    </div>
</body>
</html>
