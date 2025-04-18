@extends('layouts.modal', [
    'id'    => 'student-modal',
    'title'  => 'Informations étudiant',] )


@section('modal-content')
    <form id="create-student-form" method="POST" action="{{ route('form.students.update', ['students'=> $student -> id])}}">
        @csrf
        @method('PUT')
        <x-forms.input name="first_name" :label="__('Prénom')" required />
        <x-forms.input name="last_name" :label="__('Nom')" required />
        <x-forms.input type="date" name="birth_date" :label="__('Date de naissance')" required />
        <x-forms.input type="email" name="email" :label="__('Email')" required />
        <x-forms.input type="password" name="password" :label="__('Mot de passe')" required />

        <x-forms.primary-button type="submit">
            {{ __('Valider') }}
        </x-forms.primary-button>

        <p id="success-message" class="text-green-600 mt-3 hidden">Étudiant créé avec succès !</p>
    </form>
@overwrite
