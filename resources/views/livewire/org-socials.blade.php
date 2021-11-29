<div class="p-6">
    <h2 class="table-title">SOIS System Links</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createSocialMediaLinks">
            {{ __('Add Social Media Links') }}
        </x-jet-button>
        <x-jet-button wire:click="infoShowModel" class="ml-5" style="background: green;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
        </x-jet-button>
    </div>









<!--================================================
=            Create SNS Section comment            =
=================================================-->
<x-jet-dialog-modal wire:model="modalCreateSNSFormVisible">
            <x-slot name="title">
                {{ __('Social Media') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="org_social_link" value="{{ __('Social Media Link') }}" />
                    <x-jet-input wire:model="org_social_link" id="org_social_link" class="block mt-1 w-full" type="text" />
                    @error('org_social_link') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="embed_data" value="{{ __('Social Media Embed Data') }}" />
                    <x-jet-input wire:model="embed_data" id="embed_data" class="block mt-1 w-full" type="text" />
                    @error('embed_data') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="org_socials_id" value="{{ __('Available Social Medias') }}" />
                    <select wire:model="org_socials_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option default hidden>Choose News Type</option>
                        @foreach($getSocial as $socialType)
                            <option value="{{$socialType->social_media_id}}">{{$socialType->social_media_name}}</option>
                        @endforeach
                    </select>
                    @error('org_socials_id') <span class="error">{{ $message }}</span> @enderror
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateSNSFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Social Media') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Create SNS Section comment  ====-->































<!-- FINAL DIV -->
</div>
