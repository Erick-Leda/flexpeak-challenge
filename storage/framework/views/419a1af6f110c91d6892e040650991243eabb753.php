<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Styles -->
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
</head>
<body class="bg-purple-50 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-purple-800 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="<?php echo e(url('/')); ?>" class="text-lg font-semibold text-gray-100 no-underline">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <?php if(auth()->guard()->check()): ?>
                    <div class="w-full block flex-grow lg:flex lg:itams-center lg:w-auto">
                        <div class="text-sm lg:flex-grow ml-3">
                            <a href="<?php echo e(route("projects.index")); ?>" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                                <?php echo e(__("Projetos")); ?>

                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="no-underline hover:underline" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        <?php if(Route::has('register')): ?>
                            <a class="no-underline hover:underline" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <span><?php echo e(Auth::user()->name); ?></span>

                        <a href="<?php echo e(route('logout')); ?>"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    <?php endif; ?>
                </nav>
            </div>
        </header>


        <?php if(session("success")): ?>
            <div class="container mx-auto mt-5">
                <div class="bt-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.home/"></svg></div>
                        <div>
                            <p class="font-bold"><?php echo e(__("Nova mensagem")); ?></p>
                            <p class="text-sm"><?php echo e(session("success")); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <div class="container mx-auto px-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projetoflexpeak\resources\views/layouts/app.blade.php ENDPATH**/ ?>