<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($applications as $application)
            <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    @if($application->picture)
                    <img class="object-cover w-full h-56" src="{{ asset('picture/' . $application->picture) }}" alt="avatar">
                @endif
            <div class="py-5 text-center">
            <a href="#" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0" role="link">{{ $application->name }}e</a>
            <span class="text-sm text-gray-700 dark:text-gray-200">{{$application->email}}</span>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
