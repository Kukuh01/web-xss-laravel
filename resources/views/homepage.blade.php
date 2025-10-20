<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex mx-auto sm:px-6 lg:px-8">
            @foreach($blogs as $blog)
                <div class="max-w-sm flex flex-col justify-between p-6 mx-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{!! $blog->title !!}</h5>
                        </a>
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($blog->caption, 80, '...') }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="text-center inline-flex w-1/2 items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>