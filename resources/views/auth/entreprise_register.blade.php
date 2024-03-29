<x-guest-layout>
    <div class="flex items-center">
        <a href="{{ route('auth.user_register') }}" class="inline-block px-4 py-2 m-2 bg-blue-500 text-white rounded hover:bg-blue-700">User</a>

        <a href="{{ route('auth.entreprise_register') }}" class="inline-block px-4 py-2 m-2 bg-green-500 text-white rounded hover:bg-green-700">Entreprise</a>
    </div>


    <form class="mt-6" method="POST" action="{{route('auth.entreprise_register')}}" enctype="multipart/form-data">
        @csrf
            <input class="hidden" name="role" value="{{$role}}">

        <!-- Name -->
        <div>
            <x-input-label for="Entreprise Name" :value="__('Entreprise Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('entrname')" class="mt-2" />
        </div>

        <!-- title -->
        <div>
            <x-input-label for="Title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus  />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- logo -->
        <div>
            <x-input-label for="Logo" :value="__('Logo')" />
            <x-text-input id="logo" class="block mt-1 w-full" type="file" name="picture" :value="old('picture')" required autofocus />
            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
        </div>

        <!-- slogan -->
        <div>
            <x-input-label for="Slogan" :value="__('Slogan')" />
            <x-text-input id="Slogan" class="block mt-1 w-full" type="text" name="Slogan" :value="old('Slogan')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('Slogan')" class="mt-2" />
        </div>

        <!-- industrie -->
        <div>
            <x-input-label for="Industrie" :value="__('Industrie')" />
            <x-text-input id="industrie" class="block mt-1 w-full" type="text" name="industrie" :value="old('industrie')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('industrie')" class="mt-2" />
        </div>

        <!-- description -->
        <div>
            <x-input-label for="Description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
