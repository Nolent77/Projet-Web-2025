<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>

    <div class="shadow-lg border rounded-md p-4">
    <!-- Titre de la page -->
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6" >

                <!-- Promotions -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h2 class="text-lg font-medium text-gray-700 mt-12">Promotions</h2>
                    <p class="text-3xl font-bold text-blue-500">12</p>
                    <a href="/promotions" class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                        Gérer
                    </a>
                </div>

                <!-- Étudiants -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h2 class="text-lg font-medium text-gray-700">Étudiants</h2>
                    <p class="text-3xl font-bold text-green-500">240</p>
                    <a href="/etudiants" class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                        Gérer
                    </a>
                </div>

                <!-- Enseignants -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h2 class="text-lg font-medium text-gray-700">Enseignants</h2>
                    <p class="text-3xl font-bold text-yellow-500">18</p>
                    <a href="/enseignants" class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                        Gérer
                    </a>
                </div>

                <!-- Groupes -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
                    <h2 class="text-lg font-medium text-gray-700">Groupes</h2>
                    <p class="text-3xl font-bold text-red-500">30</p>
                    <a href="/groupes" class="text-blue-600 hover:bg-blue-100 border border-black px-4 py-2 rounded-md mt-2">
                        Gérer
                    </a>
                </div>
            </div>
    </div>
    </div>

</x-app-layout>
