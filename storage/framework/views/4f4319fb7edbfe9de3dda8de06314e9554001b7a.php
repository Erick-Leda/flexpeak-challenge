<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
</head>
<body class="bg-purple-200 h-screen antialiased leading-none font-sans">
<div class="flex flex-col">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </h1>
                <ul class="flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0" style="margin-left: 3.5em">
                        <?php if(Route::has('login')): ?>
                            <div class=" top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                                <?php if(auth()->guard()->check()): ?>
                                    <a href="<?php echo e(url('/home')); ?>" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase"><?php echo e(__('Home')); ?></a>

                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase"><?php echo e(__('Login')); ?></a>
                                    <?php if(Route::has('register')): ?>
                                        <a href="<?php echo e(route('register')); ?>" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase"><?php echo e(__('Registrar')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projetoflexpeak\resources\views/welcome.blade.php ENDPATH**/ ?>