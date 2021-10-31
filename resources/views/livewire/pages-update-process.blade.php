<div class="p-6">
<div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" style="color:red" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title" required autofocus />

                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mt-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            http://localhost:8000/
                        </span>
                        <input wire:model="slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">
                    </div>
                </div>

                    @error('slug')
                        <span class="error">{{ $message }}</span>
                    @enderror


                <div class="mt-4">
                    <x-jet-label for="content" value="{{ __('Content') }}" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">
                            <div class="body-content" wire:ignore>
                                <textarea type="text" input="content" id="summernote" class="form-control summernote">
                                    <?php echo htmlspecialchars_decode(stripslashes($content));  ?>
                                </textarea>
                                <!-- <input id="summernote" class="form-control summernote"/> -->
                                <!-- <textarea type="text" input="content" id="summernote" class="form-control summernote">{!! $content !!}</textarea> -->
                                <!-- <input type="text" name="content" id="summernote"  class="form-control"></input> -->
                            </div>
                        </div>
                    </div>

                    @error('content')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>


                <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update Page') }}
                </x-jet-secondary-button>   

</div>
