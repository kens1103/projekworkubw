<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $portofolio->title }}</title>
    <style>
        body { font-family: sans-serif; }
        img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1>{{ $portofolio->title }}</h1>
    <p>{{ $portofolio->description }}</p>
    <h3>Foto Utama:</h3>
    <img src="{{ public_path($portofolio->image) }}" alt="Main Image">

    @if ($portofolio->additionalImages->count())
        <h3>Foto Tambahan:</h3>
        @foreach ($portofolio->additionalImages as $img)
            <img src="{{ public_path($img->image) }}" alt="Additional Image" style="margin-bottom: 10px;">
        @endforeach
    @endif
</body>
</html>
