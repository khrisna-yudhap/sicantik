<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>
<style>
    .pdf {
        width: 100%;
        aspect-ratio: 4 / 3;
    }

    .pdf,
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    h1,
    h3 {
        text-align: center;
    }
</style>

<body>
    <embed class="pdf" src="{{ url('storage/app/public/modules/' . $pdf_file) }}" width="800" height="500">
</body>

</html>
