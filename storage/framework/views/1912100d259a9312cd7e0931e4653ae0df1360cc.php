<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-lt-installed="true">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="csrf-param" content="_token">
    <title>Анализатор страниц</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</head>
<body class="min-vh-100 d-flex flex-column">
<header class="flex-shrink-0">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="">Анализатор страниц</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('main') ? 'active' : ''); ?>" href="">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('urls.index') ? 'active' : ''); ?>"
                       href="">Сайты</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="flex-grow-1">
    <div class="container-lg">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<footer class="border-top py-3 mt-5 flex-shrink-0">
    <div class="container-lg">
        <div class="text-center">
            <a href="https://github.com/AslanAV" target="_blank">Aslan Autlev</a>
        </div>
    </div>
</footer>
</body>
</html>
<?php /**PATH /home/aslan/PhpstormProjects/php-project-57/resources/views/layouts/layout.blade.php ENDPATH**/ ?>