<div class="p-6">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <style>
        .modal-backdrop {
          z-index: -1;
        }
    </style>

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
                    <div class="body-content" wire:ignore>
                        <textarea type="text" input="embed_data" id="summernote" class="form-control summernote"></textarea>
                        @error('embed_data') <span class="error">{{ $message }}</span> @enderror
                    </div>
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


<!--================================
=            Summernote            =
=================================-->

<script>
    $(document).ready(function() {
        $('.summernote').summernote(
        {
        focus: true,
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
          onChange: function(contents, $editable) {
          @this.set('embed_data', contents);
        }
        }
        });
    });
</script>

<!--====  End of Summernote  ====-->

























<!-- FINAL DIV -->
</div>
