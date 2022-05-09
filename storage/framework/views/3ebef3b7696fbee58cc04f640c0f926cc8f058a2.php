<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <?php if(session('status')): ?>
            <div class="flex items-center teext-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                </svg>
                <p><?php echo e(session('status')); ?></p>
            </div>
        <?php endif; ?>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid lg:grid-cols-5 gap-3">
                        <div class="mt-1">
                            <a class="p-3 bg-blue-500 hover:bg-blue-400 rounded-md text-white "
                               href="<?php echo e(route('posts.create')); ?>">
                                Create Post
                            </a>
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto mt-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Content
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Views
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr
                                    class="bg-white border-b dark:border-gray-700dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap">
                                        <?php echo e($post->title); ?>

                                    </th>
                                    <td class="px-6 py-4">
                                        <?php echo e($post->description); ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo e(Str::of($post->content)->limit(35)); ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo e(views($post)->count()); ?>

                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="<?php echo e(route("posts.edit", $post)); ?>"
                                           class="p-3 m-3 bg-green-500 hover:bg-green-400 text-white">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form method="POST" action="<?php echo e(route("posts.delete", $post->id)); ?>">
                                            <button type="submit"
                                                    class="p-3 m-3 bg-red-500 hover:bg-red-400 text-white">Delete
                                            </button>
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field("DELETE"); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if($posts->links()): ?>
                        <?php echo e($posts->links()); ?>

                    <?php endif; ?>
                    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/dashboard.blade.php ENDPATH**/ ?>