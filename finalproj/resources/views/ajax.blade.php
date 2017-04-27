<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        {{-- App\Csssheet::where('css_state', '=', 1)->get()->first()->css_text --}}
    </style>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMS Mega') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel =; <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="panel-body">

        <p>Preview</p>
        <h3> {{ $article->art_title }}</h3>
        <div>{{ $article->art_desc }}</div>
        <p>{!! $preview !!}</p>
    </div>
</body>