<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="author" content="name"/>
    <meta name="description" content="description here"/>
    <meta name="keywords" content="keywords,here"/>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
</head>


<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<nav id="header" class="fixed w-full z-10 top-0">
    <?php if(Route::has('login')): ?>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->isAdmin()): ?>
                    <a href="<?php echo e(url('/dashboard')); ?>"
                       class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div id="progress" class="h-1 z-20 top-0"
         style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>

    <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">

        <div class="pl-4">
            <a class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl" href="#">
                <?php echo e(config("app.name")); ?>

            </a>
        </div>

        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>

        <div
            class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-100 md:bg-transparent z-20"
            id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a target="_blank" class="inline-block py-2 px-4 text-gray-900 font-bold no-underline"
                       href="https://github.com/Glenn-Rudge">GitHub</a>
                </li>
                <li class="mr-3">
                    <a target="_blank"
                       class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4"
                       href="https://linkedin.com/in/glenn-rudge">LinkedIn</a>
                </li>
                <li class="mr-3">
                    <a target="_blank"
                       class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4"
                       href="https://glenn-dev.com">Portfolio</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Container-->
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container w-full md:max-w-3xl mx-auto pt-20">

        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            <!--Title-->
            <div class="font-sans">
                
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    <a href="<?php echo e(route('posts.show', $post->id)); ?>"><?php echo e($post->title); ?></a>
                </h1>
                <p class="text-sm md:text-base font-normal text-gray-600"><?php echo e($post->created_at->diffForHumans()); ?></p>
                <div>
                    <?php if(isset($post->image->path)): ?>
                        <div>
                            <a href="<?php echo e(route('posts.show', $post->id)); ?>">
                                <img src="<?php echo e($post->image->url()); ?>" class="object-cover h-50 w-full" style="width:fi">
                                <a/>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <!--Post Content-->


            <!--Lead Para-->
            <p class="py-6">

                <?php echo Str::limit($post->content, 175, "..."); ?>

            </p>

            <!--/ Post Content-->
            <!--Author-->
            <div class="flex w-full items-center font-sans px-4 py-12">
                <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                <div class="flex-1 px-2">
                    <p class="text-base font-bold text-base md:text-xl leading-none mb-2">Jo Bloggerson</p>
                    <p class="text-gray-600 text-xs md:text-base"><?php echo e(config("app.name")); ?> <a
                            class="text-green-500 no-underline hover:underline"
                            href="https://www.tailwindtoolbox.com">link</a></p>
                </div>
                <div class="justify-end">
                    <a
                        href="<?php echo e(route('posts.show', $post->id)); ?>"
                        class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">
                        Read More
                    </a>
                </div>
            </div>
            <!--/Author-->

        </div>

        <!--Tags -->
        <div class="text-base md:text-sm text-gray-500 px-4 py-6">
            Tags:
            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route("posts.tags.index", $tag->id)); ?>"
                   class="text-base md:text-sm text-green-500 no-underline hover:underline">
                    <?php echo e($tag->name); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <!--Divider-->
        <hr class="border-b-2 border-gray-400 mb-8 mx-4">

        <!--Subscribe-->
        <div class="container px-4">
            <div class="font-sans bg-gradient-to-b from-green-100 to-gray-100 rounded-lg shadow-xl p-4 text-center">
                <h2 class="font-bold break-normal text-xl md:text-3xl">Subscribe to my Newsletter</h2>
                <h3 class="font-bold break-normal text-gray-600 text-sm md:text-base">Get the latest posts delivered
                    right to your inbox</h3>
                <div class="w-full text-center pt-4">
                    <form action="#">
                        <div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
                            <input type="email" placeholder="youremail@example.com"
                                   class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
                            <button type="submit"
                                    class="flex-1 mt-4 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Subscribe-->

        <!--Divider-->
        <hr class="border-b-2 border-gray-400 mb-8 mx-4">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="text-right">
				<span class="text-xs md:text-sm font-normal text-gray-600">

                </span><br>
        </div>

        <!--/Next & Prev Links-->

    </div>
    <!--/container-->

    <footer class="bg-white border-t border-gray-400 shadow">
        <div class="container max-w-4xl mx-auto flex py-8">

            <div class="w-full mx-auto flex flex-wrap">
                <div class="flex w-full md:w-1/2 ">
                    <div class="px-8">
                        <h3 class="font-bold text-gray-900">About</h3>
                        <p class="py-4 text-gray-600 text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus
                            commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                        </p>
                    </div>
                </div>

                <div class="flex w-full md:w-1/2">
                    <div class="px-8">
                        <h3 class="font-bold text-gray-900">Social</h3>
                        <ul class="list-reset items-center text-sm pt-3">
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                   href="#">Add social link</a>
                            </li>
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                   href="#">Add social link</a>
                            </li>
                            <li>
                                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                                   href="#">Add social link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </footer>

    <script>
        /* Progress bar */
        //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
        var h = document.documentElement,
            b = document.body,
            st = 'scrollTop',
            sh = 'scrollHeight',
            progress = document.querySelector('#progress'),
            scroll;
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");

        document.addEventListener('scroll', function () {

            /*Refresh scroll % width*/
            scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
            progress.style.setProperty('--scroll', scroll + '%');

            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");

            }

        });


        //Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function () {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>

</body>

</html>
<?php /**PATH /var/www/html/resources/views/welcome.blade.php ENDPATH**/ ?>