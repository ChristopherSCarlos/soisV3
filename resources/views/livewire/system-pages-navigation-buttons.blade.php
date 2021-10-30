<div class="mt-3 mb-0">
    <x-jet-button wire:click="defaultHomeapge">
        {{ __('View System Default') }}
    </x-jet-button>
    <x-jet-button wire:click="systemPageCrud">
        {{ __('System Pages Menu') }}
    </x-jet-button>
    <x-jet-button wire:click="createSystemPage">
        {{ __('Create System Page') }}
    </x-jet-button>
</div>