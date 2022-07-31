<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    The only model in this challenge is <strong>Article</strong> so here is a simple interface for creating, editing, deleting and recovering articles, 
                    and depending on the role of the user, the corresponding action buttons will be shown or hidden.

                    <p class="text-sm text-gray-400 my-4">This interface was developed using Laravel's livewire, tailwind as the CSS framework and SweetAlert2 for the flash messages.</p>

                    @can('ver articulo')
                      @livewire('articles')
                    @endcan

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
