<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container w-full md:max-w-3xl mx-auto pt-20">
        <!--Author-->
        <div class="flex w-full items-center font-sans px-4 py-12">
            <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
            <div class="flex-1 px-2">
                <p class="text-base font-bold text-base md:text-xl leading-none mb-2">Jo Bloggerson</p>
                <p class="text-gray-600 text-xs md:text-base">{{ config("app.name") }} <a
                        class="text-green-500 no-underline hover:underline"
                        href="https://www.tailwindtoolbox.com">link</a></p>
            </div>
            <div class="justify-end">
                <button
                    class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">
                    Read More
                </button>
            </div>
        </div>
        <!--/Author-->
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

            <!--Title-->
            <div class="font-sans">
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                </h1>
                <p class="text-sm md:text-base font-normal text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                <div>
                    @if(isset($post->image->path))
                        <div>
                            <img src="{{ $post->image->url() }}" class="object-cover h-48 w-full">
                        </div>
                    @endif
                </div>
            </div>


            <!--Post Content-->


            <!--Lead Para-->
            <p class="py-6">
                {!! $post->content !!}
            </p>

            <!--/ Post Content-->

        </div>

        <!--Tags -->
        <div class="text-base md:text-sm text-gray-500 px-4 py-6">
            Tags:
            @foreach($post->tags as $tag)
                <a href="{{ route("posts.tags.index", $tag->id) }}"
                   class="text-base md:text-sm text-green-500 no-underline hover:underline">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
        <!--Divider-->
        <hr class="border-b-2 border-gray-400 mb-8 mx-4">

        <!--Comments -->
        <div class="mt-5 text-base md:text-sm text-gray-500 px-4 py-6 flex flex-col-reverse">
            @if(Auth::check())
                <p class="pt-5">Comments:</p>
                @if(isset($post->comments))
                    @foreach($post->comments as $comment)
                        <div class="mt-5 rounded overflow-hidden shadow-lg">
                            <div class="px-6 py-4">
                                {{ $comment->created_at->diffForHumans() }}
                                <div class="font-bold text-xl mb-2">{{ $comment->user->name }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $comment->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            @else
                <div class="bg-green-600 text-center py-4 lg:px-4">
                    <div
                        class="p-2 bg-greeb-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex"
                        role="alert">
                    <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">
                        <a href="/register">Login</a>
                    </span>
                        <span class="font-semibold mr-2 text-left flex-auto">
                        Login to view other user comments
                    </span>
                        <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/>
                        </svg>
                    </div>
                </div>
            @endif
        </div>

        <!--Divider-->
        <hr class="border-b-2 border-gray-400 mb-8 mx-4">

        <!--Tags -->
        <div class="text-base md:text-sm text-gray-500 px-4 py-6">
            @if(Auth::check())
                <form action="/comments" method="POST" class="w-full p-4">
                    @csrf
                    <div class="mb-2">
                        <label for="comment" class="text-lg text-gray-600">Add a comment</label>
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <div
                                    class="m-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <span class="block sm:inline">{{ $error }}</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                                </div>
                            @endforeach
                        @endif
                        <textarea
                            class="w-full h-20 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1"
                            name="content"></textarea>
                    </div>
                    <button
                        type="submit"
                        class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded">
                        Comment
                    </button>
                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"/>
                </form>
            @else
                <div class="bg-green-600 text-center py-4 lg:px-4">
                    <div
                        class="p-2 bg-white items-center text-black leading-none lg:rounded-full flex lg:inline-flex"
                        role="alert">
                    <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">
                        <a href="/register">Register</a>
                    </span>
                        <span class="font-semibold mr-2 text-left flex-auto">
                        Log in to leave a comment, <br/>
                        or create an account
                    </span>
                        <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/>
                        </svg>
                    </div>
                </div>
            @endif
        </div>
    {{--TODO:// Add comment pagination to post show page.--}}
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

        <!--/Next & Prev Links-->

    </div>
    { $post }}

</x-app-layout>
