<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $portofolio->title }}</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }
        h1 {
            margin-bottom: 5px;
        }
        p {
            margin-top: 0;
        }
        .main-image {
            width: 100%;
            max-width: 300px;
            height: auto;
            margin-bottom: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery img {
            width: 100%;
            max-width: 300px;
            height: auto;
            padding: 4px;
        }
    </style>
</head>
<body>
    <h1>{{ $portofolio->title }}</h1>
    <p>{{ $portofolio->description }}</p>

    <h3>Foto Utama :</h3>
    <img src="{{ public_path($portofolio->image) }}" alt="Foto Utama" class="main-image">

    @if ($portofolio->additionalImages->count())
        <h3>Foto Tambahan :</h3>
        <div class="gallery">
            @foreach ($portofolio->additionalImages as $img)
                <img src="{{ public_path($img->image) }}" alt="Foto Tambahan">
            @endforeach
        </div>
    @endif
</body>
</html>
