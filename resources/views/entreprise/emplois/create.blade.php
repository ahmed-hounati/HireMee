<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form class="mt-6" method="POST" action="{{ route('entreprise.emplois.create') }}" enctype="multipart/form-data">
                @csrf
                <!-- pic -->
                <div>
                    <x-input-label for="image" :value="__('image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <!-- title -->
                <div>
                    <x-input-label for="Title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus  />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- description -->
                <div>
                    <x-input-label for="description" :value="__('description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus  />
                    <x-input-error :messages="$errors->get('post')" class="mt-2" />
                </div>

                <!-- competences -->
                <div class="flex items-center gap-2">
                    <div class="flex-grow">
                        <x-input-label for="competences" :value="__('competences')" />
                        <x-text-input id="competences" class="block mt-1 w-full" type="text" name="competences[]" :value="old('competences[]')" required autofocus  />
                        <x-input-error :messages="$errors->get('competences')" class="mt-2" />
                    </div>
                    <a id="addInputButton" class="bg-blue-500 mt-4 text-white p-2 rounded-full"><i class="fa-solid fa-plus"></i></a>
                </div>

                <!-- emplacement -->
                <div>
                    <x-input-label for="emplacement" :value="__('emplacement')" />
                    <x-text-input id="emplacement" class="block mt-1 w-full" type="text" name="emplacement" :value="old('emplacement')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('emplacement')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="contract" class="text-gray-700 dark:text-gray-200">Contract</label>
                    <select name="contract" class="border rounded w-full sm:w-2/3 md:w-1/2 lg:w-1/3 xl:w-1/4 py-2 px-3 focus:outline-none focus:ring focus:border-blue-300">
                        <option value="" disabled selected>Select a contract type</option>
                        <option value="à distance">À distance</option>
                        <option value="hybrid">Hybrid</option>
                        <option value="à temps plein">À temps plein</option>
                    </select>
                </div>

                <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Add
                </button>

            </form>
        </div>
    </div>

    <script>

        document.getElementById("addInputButton").addEventListener("click", function() {
            addInput();
        });

        function addInput() {
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "competences[]";
            newInput.className =
                " bg-gray-800 block mt-1 w-full";
            newInput.placeholder = "competences";
            document.getElementById("competences").parentNode.appendChild(newInput);
        }
    </script>

</x-app-layout>
