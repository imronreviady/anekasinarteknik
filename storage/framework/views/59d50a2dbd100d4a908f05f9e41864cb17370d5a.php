<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="author" content="Aneka Sinar Teknik">
    <link rel="icon" href="<?php echo asset('resources/views/frontend/assets/img/basic/favicon.ico'); ?>" type="image/x-icon">
    <title>Aneka Sinar Teknik | <?php echo e($pageTitle); ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo asset('resources/views/frontend/assets/css/app.css'); ?>">
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