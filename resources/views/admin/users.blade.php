<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-16 md:grid-cols-2 xl:grid-cols-3">
            @foreach($users as $user)
                <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    @if($user->picture)
                        <img class="object-cover w-full h-56" src="{{ asset('picture/' . $user->picture) }}" alt="avatar">
                    @endif
                    <div class="py-5 text-center">
                        <a href="#" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0" role="link">{{ $user->name }}e</a>
                        <span class="text-sm text-gray-700 dark:text-gray-200">{{$user->email}}</span>
                    </div>
                        <form class="flex justify-center" method="POST" action="/archive/{{$user->id}}">
                            @csrf
                            <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">archive</button>
                        </form>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
