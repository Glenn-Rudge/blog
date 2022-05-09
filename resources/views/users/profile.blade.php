<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1 class="text-center mt-5 text-3xl text-gray-700"
    >
        Welcome to your profile {{ $user->name }}</h1>
</x-app-layout>
