<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
           <span class="text-gray-700">
               {{ __('Promotions') }}
           </span>
        </h1>
    </x-slot>


    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Mes promotions</h3>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[280px]">
                                           <span class="sort asc">
                                                <span class="sort-label">Promotion</span>
                                                <span class="sort-icon"></span>
                                           </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                           <span class="sort">
                                               <span class="sort-label">Année</span>
                                               <span class="sort-icon"></span>
                                           </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                           <span class="sort">
                                               <span class="sort-label">Ecole</span>
                                               <span class="sort-icon"></span>
                                           </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                           <span class="sort">
                                               <span class="sort-label">Action</span>
                                               <span class="sort-icon"></span>
                                           </span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cohorts as $cohort)
                                            <tr>
                                                <td>{{ $cohort->name }}</td>
                                                <td>{{ $cohort->start_date }}</td>
                                                <td>{{$cohort->school->name}}</td>
                                                <td>
                                                    <!-- Delete button -->
                                                    <form action="{{ route('cohorts.delete', $cohort->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                                            <i class="ki-filled ki-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true" name="perpage"></select>
                                    per page
                                </div>
                                <div class="flex items-center gap-4 order-1 md:order-2">
                                    <span data-datatable-info="true"></span>
                                    <div class="pagination" data-datatable-pagination="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter une promotion
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <form id="create-student-form" method="POST" action="{{ route('cohorts.store') }}">
                        @csrf
                        <x-forms.input name="name" :label="__('Nom')" />


                        <x-forms.input name="description" :label="__('Description')" />


                        <x-forms.input type="date" name="start_date" :label="__('Début de l\'année')" placeholder="" />


                        <x-forms.input type="date" name="end_date" :label="__('Fin de l\'année')" placeholder="" />

                        <x-forms.dropdown name="school_id" :label="__('Schools')">
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </x-forms.dropdown>

                        <x-forms.primary-button type="submit">
                            {{ __('Valider') }}
                        </x-forms.primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>

