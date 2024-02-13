<x-app-layout>
    <div class="ml-32 text-white border border-gray-300 rounded-sm shadow-lg py-10 px-10 w-4/5 mt-10 mb-10">
        <!-- header (profile) -->
        <header>
            <div class="flex justify-between items-center">
                    <div>
                        @if($user->picture)
                        <img class="bg-cover bg-no-repeat rounded-full h-52 w-52" src="{{ asset('picture/' . $user->picture) }}" alt="Employment Image">
                        @endif
                    </div>
                <div class="grid justify-items-end">
                    <h1 class="text-7xl font-extrabold">{{$user->name}}</h1>
                    <p class="text-xl mt-5">{{$user->post}}</p>
                </div>
            </div>
        </header>
        <!-- detailed info -->
        <main class="flex gap-x-10 mt-10">
            <div class="w-2/6">
                <!-- contact details -->
                <strong class="text-xl font-medium">Contact Details</strong>
                <ul class="mt-2 mb-10">
                    <li class="px-2 mt-1"><strong class="mr-1">Phone </strong>
                        <a href="tel:+821023456789" class="block">+82 10 2345 6789</a>
                    </li>
                    <li class="px-2 mt-1"><strong class="mr-1">E-mail </strong>
                        <a href="mailto:" class="block">aspiringfe@helloworld.com</a>
                    </li>
                    <li class="px-2 mt-1"><strong class="mr-1">Location</strong><span class="block">Seoul,
                            South Korea</span></li>
                </ul>
                <!-- skills -->
                <strong class="text-xl font-medium">Skills</strong>
                <ul class="mt-2 mb-10">
                    @foreach($cv->compet as $oneCv)
                    <li class="px-2 mt-1">{{$oneCv}}</li>
                    @endforeach
                </ul>
            </div>
            <!-- info -->
            <div class="w-4/6">
                <section>
                    <!-- about me -->
                    <h2 class="text-2xl pb-1 border-b font-semibold">About</h2>
                    <p class="mt-4 text-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus
                        deserunt modi qui. Dolorum aliquid quasi velit cupiditate officia magnam impedit, sapiente
                        hic, eaque quaerat ullam fugiat reprehenderit voluptates odit! Error.
                        Tempore fuga iusto eveniet omnis impedit repellat ab repellendus nesciunt similique. Iure
                        voluptates, enim nesciunt tempora amet earum, porro rem ad et sequi corrupti neque quidem?
                        Debitis quo quibusdam nemo.
                        Nam doloremque perferendis tempora asperiores, ullam praesentium et, voluptas pariatur illo
                        aliquid similique, fugiat repellendus ipsa necessitatibus minus hic culpa quasi. Sed
                        voluptate itaque accusantium earum cupiditate ipsa neque magnam!</p>

                </section>

                <section>
                    <!-- work experiences -->
                    <h2 class="text-2xl mt-6 pb-1 border-b font-semibold">Work Experiences</h2>
                    <ul class="mt-2">
                        @foreach($cv->experiences as $oneCv)
                        <li class="pt-2">
                            <p class="text-justify text-xs">
                                {{$oneCv}}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </section>
                <section>
                    <!-- education -->
                    <h2 class="text-2xl mt-6 pb-1 border-b font-semibold">Education</h2>
                    <ul class="mt-2">
                        @foreach($cv->cursus as $oneCv)
                        <li class="pt-2">
                            <p class="flex justify-between text-sm">{{$oneCv}}</p>
                        </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </main>
        </div>
</x-app-layout>
