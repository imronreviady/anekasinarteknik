<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Aneka Sinar Teknik">
    <link rel="icon" href="{!! asset('resources/views/frontend/assets/img/basic/favicon.ico') !!}" type="image/x-icon">
    <title>Aneka Sinar Teknik | {{ $pageTitle }}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{!! asset('resources/views/frontend/assets/css/app.css') !!}">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }
        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>