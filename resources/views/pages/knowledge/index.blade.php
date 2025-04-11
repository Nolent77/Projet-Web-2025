<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Bilans de connaissances') }}
            </span>
        </h1>
    </x-slot>


        <div class="container mx-auto px-4 py-6">
            <!-- Liste des compétences -->
            <section class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800">Liste des compétences</h2>
                <table class="min-w-full table-auto mt-4 border-collapse">
                    <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600">Compétence</th>
                        <th class="px-4 py-2 text-left text-gray-600">Statut</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-4 py-2">Laravel</td>
                        <td class="px-4 py-2">Acquis</td>
                        <td class="px-4 py-2">
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">HTML/CSS</td>
                        <td class="px-4 py-2">En cours</td>
                        <td class="px-4 py-2">
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Python</td>
                        <td class="px-4 py-2">Non acquis</td>
                        <td class="px-4 py-2">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>

            <!-- Bilan des compétences -->
            <section class="mt-5 mb-6">
                <h2 class="text-lg font-semibold text-gray-800">Bilan des compétences</h2>
                <div class="grid grid-cols-3 gap-4 mt-4">
                    <div class="bg-green-100 p-4 rounded shadow">
                        <h3 class="text-md font-semibold text-green-600">Compétences Acquises</h3>
                        <ul class="mt-2 text-sm text-gray-700">
                            <li>Compétence 1</li>
                            <li>Compétence 4</li>
                        </ul>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded shadow">
                        <h3 class="text-md font-semibold text-yellow-600">Compétences en Cours</h3>
                        <ul class="mt-2 text-sm text-gray-700">
                            <li>Compétence 2</li>
                        </ul>
                    </div>
                    <div class="bg-red-100 p-4 rounded shadow">
                        <h3 class="text-md font-semibold text-red-600">Compétences Non Acquises</h3>
                        <ul class="mt-2 text-sm text-gray-700">
                            <li>Compétence 3</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Tâches à faire -->
            <section class="mt-5 mb-6">
                <h2 class="text-lg font-semibold text-gray-800">Tâches à faire</h2>
                <ul class="mt-4 list-disc pl-6 text-gray-700">
                    <li>Compléter la formation sur la compétence 2</li>
                    <li>Réviser la compétence 3 avant l'évaluation</li>
                    <li>Mettre à jour le statut de la compétence 1</li>
                </ul>
            </section>

            <!-- Formulaire de mise à jour -->
            <section class="mt-5 mb-6">
                <h2 class="text-lg font-semibold text-gray-800">Mettre à jour vos compétences</h2>
                <form class="mt-4">
                    <div class="mt-2mb-4">
                        <label for="competence-name" class="block text-sm font-medium text-gray-700">Nom de la compétence</label>
                        <input type="text" id="competence-name" name="competence-name" class="mt-1 p-2 border border-gray-300 rounded w-full" placeholder="Nom de la compétence">
                    </div>

                    <div class="mt-2 mb-4">
                        <label for="competence-status" class="block text-sm font-medium text-gray-700">Statut</label>
                        <select id="competence-status" name="competence-status" class="mt-1 p-2 border border-gray-300 rounded w-full">
                            <option value="acquis">Acquis</option>
                            <option value="en-cours">En cours</option>
                            <option value="non-acquis">Non acquis</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded border-2 border-blue-700">Mettre à jour</button>
                </form>
            </section>
        </div>
    </x-app-layout>

