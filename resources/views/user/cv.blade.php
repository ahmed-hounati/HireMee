<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="text-white text-center text-xl" >make you CV</h1>
            <form class="mt-6" method="POST" action="{{route('user.cv')}}" enctype="multipart/form-data">
                @csrf

                <!-- competences -->
                @foreach($cv->compet as $oneCv)
                    <div class="container">
                        <div class="flex items-center gap-2">
                            <div class="flex-grow">
                                <x-input-label for="competences" :value="__('competences')" />
                                <x-text-input id="competences" class="block mt-1 w-full" type="text" name="compet[]" :value="$oneCv"  required autofocus  />

                                <x-input-error :messages="$errors->get('competences')" class="mt-2" />
                            </div>
                            <a id="addInputButton" class="bg-blue-500 mt-4 text-white p-2 rounded-full"><i class="fa-solid fa-plus"></i></a>
                            <a class="removeButton bg-red-500 mt-4 text-white p-2 rounded-full"><i class="fa-solid fa-minus"></i></a>
                        </div>
                    </div>
                @endforeach

                @csrf

                <!-- experiences -->
                @foreach($cv->experiences as $oneCv)
                <div class="flex items-center gap-2">
                    <div class="flex-grow">
                        <x-input-label for="experiences" :value="__('experiences')" />
                        <x-text-input id="experiences" class="block mt-1 w-full" type="text" name="experiences[]" :value="$oneCv" required autofocus  />
                        <x-input-error :messages="$errors->get('experiences')" class="mt-2" />
                    </div>
                    <a id="addExperiences" class="bg-blue-500 mt-4 text-white p-2 rounded-full"><i class="fa-solid fa-plus"></i></a>
                </div>
                @endforeach
                <!-- cursus -->
                @foreach($cv->cursus as $oneCv)
                <div class="flex items-center gap-2">
                    <div class="flex-grow">
                        <x-input-label for="cursus" :value="__('cursus')" />
                        <x-text-input id="cursus" class="block mt-1 w-full" type="text" name="cursus[]" :value="$oneCv" required autofocus  />
                        <x-input-error :messages="$errors->get('cursus')" class="mt-2" />
                    </div>
                    <a id="addCursus" class="bg-blue-500 mt-4 text-white p-2 rounded-full"><i class="fa-solid fa-plus"></i></a>
                </div>
                @endforeach


                <!-- langues -->
                @foreach($cv->langues as $oneCv)
                <div class="flex items-center gap-2">
                    <div class="flex-grow">
                        <x-input-label for="languages" :value="__('languages')" />
                        <x-text-input id="langues" class="block mt-1 w-full" type="text" name="langues[]" :value="$oneCv" required autofocus  />
                        <x-input-error :messages="$errors->get('langues')" class="mt-2" />
                    </div>
                    <a id="addLangues" class="bg-blue-500 mt-4 text-white p-2 rounded-full"><i class="fa-solid fa-plus"></i></a>>
                </div>
                @endforeach

                <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Add
                </button>

            </form>
        </div>
    </div>

    <script>

        document.addEventListener('click', function(event) {
            const isRemoveButton = event.target.classList.contains('removeButton');

            if (isRemoveButton) {
                event.target.closest('.container').remove();
            }
        });

        document.getElementById("addInputButton").addEventListener("click", function() {
            addInput();
        });

        document.getElementById("addExperiences").addEventListener("click", function() {
            addExperiences();
        });

        document.getElementById("addCursus").addEventListener("click", function() {
            addCursus();
        });

        document.getElementById("addLangues").addEventListener("click", function() {
            addLangues();
        });

        function addInput() {
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "compet[]";
            newInput.className =
                " bg-gray-800 block mt-1 w-full";
            newInput.placeholder = "competences";
            document.getElementById("competences").parentNode.appendChild(newInput);
        }

        function addExperiences(){
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "experiences[]";
            newInput.className =
                " bg-gray-800 block mt-1 w-full";
            newInput.placeholder = "experiences";
            document.getElementById("experiences").parentNode.appendChild(newInput);
        }

        function addCursus(){
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "cursus[]";
            newInput.className =
                " bg-gray-800 block mt-1 w-full";
            newInput.placeholder = "cursus";
            document.getElementById("cursus").parentNode.appendChild(newInput);
        }

        function addLangues(){
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "langues[]";
            newInput.className =
                " bg-gray-800 block mt-1 w-full";
            newInput.placeholder = "languages";
            document.getElementById("langues").parentNode.appendChild(newInput);
        }
    </script>
</x-app-layout>
