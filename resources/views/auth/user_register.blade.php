<x-guest-layout>
    <div class="flex items-center">
        <a href="{{ route('auth.user_register') }}" class="inline-block px-4 py-2 m-2 bg-blue-500 text-white rounded hover:bg-blue-700">User</a>

        <a href="{{ route('auth.entreprise_register') }}" class="inline-block px-4 py-2 m-2 bg-green-500 text-white rounded hover:bg-green-700">Entreprise</a>
    </div>

    <form class="mt-6" method="POST" action="{{ route('register') }}">
        @csrf
        <input class="hidden" name="role" value="{{$role}}">

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- pic -->
        <div>
            <x-input-label for="Picture" :value="__('Picture')" />
            <x-text-input id="Picture" class="block mt-1 w-full" type="file" name="picture" :value="old('picture')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('picture')" class="mt-2" />
        </div>

        <!-- title -->
        <div>
            <x-input-label for="Title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- post -->
        <div>
            <x-input-label for="UR POST" :value="__('UR POST')" />
            <x-text-input id="post" class="block mt-1 w-full" type="text" name="post" :value="old('post')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('post')" class="mt-2" />
        </div>

        <!-- industrie -->
        <div>
            <x-input-label for="industrie" :value="__('industrie')" />
            <x-text-input id="industrie" class="block mt-1 w-full" type="text" name="industrie" :value="old('industrie')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('industrie')" class="mt-2" />
        </div>

        <!-- about -->
        <div>
            <x-input-label for="About" :value="__('About')" />
            <x-text-input id="about" class="block mt-1 w-full" type="text" name="about" :value="old('about')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('about')" class="mt-2" />
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
