<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>

    <div class="shadow-lg border rounded-md p-4">

        <!-- Page title -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6" >

            <!-- Cohorts -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-medium text-gray-700 mt-12">Promotions</h2>
                <p class="text-3xl font-bold text-blue-500">{{$cohorts->count()}}</p>
                <a href="/cohorts" class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                    Gérer
                </a>
            </div>

            <!-- Students-->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-medium text-gray-700">Étudiants</h2>
                <p class="text-3xl font-bold text-green-500">{{$students->count()}}</p>
                <a href="/students" class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                    Gérer
                </a>
            </div>

            <!-- Teachers -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-medium text-gray-700">Enseignants</h2>
                <p class="text-3xl font-bold text-yellow-500">{{$teachers->count()}}</p>
                <a href="/teachers" class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                    Gérer
                </a>
            </div>

            <!-- Groups -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-medium text-gray-700">Groupes</h2>
                <p class="text-3xl font-bold text-red-500">1</p>
                <a href="/groups    " class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                    Gérer
                </a>
            </div>
        </div>
    </div>

    {{-- @foreach($cohorts as $cohort) --}}
    {{-- {{$cohort->name}} --}}
    {{-- @endforeach --}}

</x-app-layout>
