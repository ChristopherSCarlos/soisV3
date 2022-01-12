<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('System Pages') }}
        </h2>
        @livewire('system-pages-navigation-buttons')
    </x-slot>

    <div class="py-12">
        <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('pages')
            </div>
        </div>
    </div>

    <div class="flex">
        <div class="py-12">
            <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('pages-navigation')
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('navigation-types')
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
