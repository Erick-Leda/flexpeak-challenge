<?php $__env->startSection("content"); ?>
    <div class="flex justify-center flex-wrap bg-blue-200 rounded-md p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5"><?php echo e(__("Lista de Projetos")); ?></h1>
            <a href="<?php echo e(route("projects.create")); ?>" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <?php echo e(__("Criar Projeto")); ?>

            </a>
        </div>
    </div>

    <table class="border-separate border-2 text-center border-blue-500 mt-3" style="width: 100%">
        <thead>
        <tr>
            <th class="px-4 py-2"><?php echo e(__("Nome")); ?></th>
            <th class="px-4 py-2"><?php echo e(__("Autor")); ?></th>
            <th class="px-4 py-2"><?php echo e(__("Data")); ?></th>
            <th class="px-4 py-2"><?php echo e(__("Ações")); ?></th>
        </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($project->name); ?></td>
                    <td class="border px-4 py-2"><?php echo e($project->user->name); ?></td>
                    <td class="border px-4 py-2"><?php echo e(date_format($project->created_at, "d/m/Y")); ?></td>
                    <td class="border px-4 py-2">
                        <a href="<?php echo e(route("projects.edit", ["project" => $project])); ?>" class="text-blue-400"><?php echo e(__("Editar")); ?></a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-project-<?php echo e($project->id); ?>-form').submit();"
                        ><?php echo e(__("Eliminar")); ?>

                        </a>
                        <form id="delete-project-<?php echo e($project->id); ?>-form" action="<?php echo e(route("projects.destroy", ["project" => $project])); ?>" method="POST" class="hidden">
                            <?php echo method_field("DELETE"); ?>
                            <?php echo csrf_field(); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold"><?php echo e(__("Não existem projetos")); ?></strong></p>
                            <span class="block sm:inline"><?php echo e(__("Ainda não existem arquivos aqui")); ?></span>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if($projects->count()): ?>
        <div class="mt-3">
            <?php echo e($projects->links()); ?>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projetoflexpeak\resources\views/projects/index.blade.php ENDPATH**/ ?>