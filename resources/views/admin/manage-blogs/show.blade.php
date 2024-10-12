
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $blog->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->user->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, Educator & CEO at Diddy Party</p>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    <time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ Carbon\Carbon::parse($blog->created_at)->translatedFormat('l, d F Y') }}</time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $blog->title }}</h1>
                </header>

                <div class="w-1/2 text-justify">
                    <p class="text-xl text-slate-700">
                        {{ $blog->caption }}
                    </p>
                </div>

                <div class="mt-5">
                    <a class="px-3 py-2 bg-red-500 hover:bg-red-600 rounded-lg text-white font-bold" href="">Delete</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



