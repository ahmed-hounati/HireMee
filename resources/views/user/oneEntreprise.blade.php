<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="bg-red-500 text-white p-3 mb-2">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('status'))
                <div class="bg-green-500 text-white p-3 mb-2">
                    {{ session('status') }}
                </div>
            @endif

            <form class="max-w-sm mx-auto" action="{{ route('subscribe') }}" method="POST">
                @csrf
                <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                <div class="">
                    <input type="text" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" required placeholder="name@flowbite.com">
                    <button class="text-white mt-6 bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Subscribe</button>
                </div>
            </form>
            <div class="grid grid-cols-1 gap-8 xl:mt-12 xl:gap-16 md:grid-cols-2 xl:grid-cols-3">
                    <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        @if($entreprise->picture)
                            <img class="object-cover w-full h-56" src="{{ asset('picture/' . $entreprise->picture) }}" alt="avatar">
                        @endif
                        <div class="py-5 text-center">
                            <a href="entreprise/{{$entreprise->id}}" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0" role="link">{{ $entreprise->title }}</a>
                            <span class="text-sm text-gray-700 dark:text-gray-200">{{$entreprise->email}}</span>
                            <p class="text-sm text-gray-700 dark:text-gray-200">{{$entreprise->description}}</p>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</x-app-layout>
