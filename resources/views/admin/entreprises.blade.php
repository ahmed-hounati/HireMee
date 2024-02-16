<x-app-layout>
{{--    <div class="mt-16">--}}
{{--        <form class="max-w-md mx-auto" method="get" action="{{ route('user.entreprise') }}">--}}
{{--            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>--}}
{{--            <div class="relative">--}}
{{--                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">--}}
{{--                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">--}}
{{--                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <input type="search" name="query" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />--}}
{{--                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-16 md:grid-cols-2 xl:grid-cols-3">
                @foreach($entreprises as $entreprise)
                    <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        @if($entreprise->picture)
                            <img class="object-cover w-full h-56" src="{{ asset('picture/' . $entreprise->picture) }}" alt="avatar">
                        @endif
                        <div class="py-5 text-center">
                            <a href="entreprise/{{$entreprise->id}}" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0" role="link">{{ $entreprise->title }}</a>
                            <span class="text-sm text-gray-700 dark:text-gray-200">{{$entreprise->email}}</span>
                            <p class="text-sm text-gray-700 dark:text-gray-200">{{$entreprise->description}}</p>
                        </div>
                            <form class="flex justify-center" method="POST" action="/archive/{{$entreprise->id}}">
                                @csrf
                                <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">archive</button>
                            </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
