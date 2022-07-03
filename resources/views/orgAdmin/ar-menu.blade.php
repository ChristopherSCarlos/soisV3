<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accomplishment Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight p-6">
                    {{ __('Quick Links') }}
                </h2>
                @livewire('a-r-links')
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('ar-menu')
            </div>
        </div>
    </div>


</x-app-layout>
