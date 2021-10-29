<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createNews">
            {{ __('Create News') }}
        </x-jet-button>
    </div>


    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Sub-Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Content</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Creation</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">News Link</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Featured In Newspage</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Top News</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($articleDataController == 'Super Admin')                                    
                                @if($articleDatas->count())
                                    @foreach($articleDatas as $item)
                                         <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->articles_id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_title }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_subtitle }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_content }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <a href="{{ url($item->article_slug) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                                   {{ $item->article_slug }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="updateNewsShowModal({{ $item->articles_id }})">
                                                    {{__('Update')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="deleteNewsShowModal({{ $item->articles_id }})">
                                                    {{__('Delete')}}
                                                </x-jet-danger-button>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap" style="@if($item->is_featured_in_newspage == 1)  
                                                                                                background: rgba(25, 98, 181, 1);
                                                                                            @else
                                                                                                background: rgba(173, 45, 16, 1.0);
                                                                                            @endif">
                                                <x-jet-button wire:click="featuredNewsShowModal({{ $item->articles_id }})">
                                                    
                                                    {{__('Feature')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="deletefeaturedNewsShowModal({{ $item->articles_id }})">
                                                    {{__('UnFeature')}}
                                                </x-jet-danger-button>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="setTopNewsShowModal({{ $item->articles_id }})">
                                                    
                                                    {{__('Set As Top News')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="unSetTopNewsShowModal({{ $item->articles_id }})">
                                                    {{__('Not Set as top News')}}
                                                </x-jet-danger-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @else
                                @if($articleOrganization->count())
                                    @foreach($articleOrganization as $item)
                                         <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->articles_id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_title }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_subtitle }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->article_content }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <a href="{{ url($item->article_slug) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                                    {{ $item->article_slug }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="updateNewsShowModal({{ $item->articles_id }})">
                                                    {{__('Update')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="deletefeaturedNewsShowModal({{ $item->articles_id }})">
                                                    {{__('Delete')}}
                                                </x-jet-danger-button>
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="featuredNewsToOrganizationPageShowModal({{ $item->articles_id }})">
                                                    {{__('Feature')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="unFeaturedNewsToOrganizationPageShowModal({{ $item->articles_id }})">
                                                    {{__('UnFeature')}}
                                                </x-jet-danger-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                        <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">
                                                No Results Found
                                            </td>
                                        </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if($articleDataController == 'Super Admin')
        {{$articleDatas->links()}}
    @else
        {{$articleOrganization->links()}}
    @endif

<!-- MODALS -->
    <!-- CREATE NEWS MODALS -->
<!--=================================================
=            Create News Section comment            =
==================================================-->
        <x-jet-dialog-modal wire:model="modalCreateNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Article Title') }}" />
                    <x-jet-input wire:model="article_title" id="article_title" class="block mt-1 w-full" type="text" />
                    @error('article_title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="article_subtitle" value="{{ __('Article Sub-Title') }}" />
                    <x-jet-input wire:model="article_subtitle" id="article_subtitle" class="block mt-1 w-full" type="text" />
                    @error('article_subtitle') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="article_content" value="{{ __('Article Content') }}" />
                    <textarea wire:model="article_content" id="article_content" class="block mt-1 w-full"></textarea>
                    @error('article_content') <span class="error">{{ $message }}</span> @enderror
                </div>
                <!--  -->
                <div class="mt-4">
                    <x-jet-label for="article_slug" value="{{ __('organization slug') }}" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            http://localhost:8000/{{$userOrgSlug}}/
                        </span>
                        <input wire:model="article_slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">
                    </div>
                    @error('article_slug') <span class="error">{{ $message }}</span> @enderror
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create News') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Create News Section comment  ====-->


<!--=============================================================
=            Update News In Homepage Section comment            =
==============================================================-->
        <x-jet-dialog-modal wire:model="modalUpdateNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Article Title') }}" />
                    <x-jet-input wire:model="article_title" id="article_title" class="block mt-1 w-full" type="text" />
                    @error('article_title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="article_subtitle" value="{{ __('Article Sub-Title') }}" />
                    <x-jet-input wire:model="article_subtitle" id="article_subtitle" class="block mt-1 w-full" type="text" />
                    @error('article_subtitle') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="article_content" value="{{ __('Article Content') }}" />
                    <textarea wire:model="article_content" id="article_content" class="block mt-1 w-full"></textarea>
                    @error('article_content') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="type" value="{{ __('Type') }}" />
                    <select wire:model="type" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="Featured">Featured</option>
                        <option value="NotFeatured">NotFeatured</option>
                    </select>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalUpdateNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update News') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Update News In Homepage Section comment  ====-->


<!--=================================================
=            Delete News Section comment            =
==================================================-->
        <x-jet-dialog-modal wire:model="modalDeleteNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Are you sure you want to delete your news? Once your news is deleted, all of its resources and data will be permanently deleted. Do you wish to proceed?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalDeleteNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete News') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delete News Section comment  ====-->


<!--=============================================================
=            Add Feature In Homepage Section comment            =
==============================================================-->
        <x-jet-dialog-modal wire:model="modalFeatureNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Continuing this process will enable this news to be displayed in the featured section of News page in the homepage. Do you want to continue wth this process?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFeatureNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="featureProcess" wire:loading.attr="disabled">
                    {{ __('Feature News in Newspage') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Add Feature In Homepage Section comment  ====-->


<!--=================================================================
=            UnFeaturre News in Homepage Section comment            =
==================================================================-->
        <x-jet-dialog-modal wire:model="modalDeleteFeatureNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Continuing this process will enable this news to be displayed in the featured section of News page in the homepage. Do you want to continue wth this process?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalDeleteFeatureNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="UnfeatureProcess" wire:loading.attr="disabled">
                    {{ __('UnFeature News in Newspage') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of UnFeaturre News in Homepage Section comment  ====-->


<!--==========================================================
=            Set News as Top News Section comment            =
===========================================================-->
        <x-jet-dialog-modal wire:model="modalSetTopNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }} {{$newsId}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Continuing this process will enable this news to be displayed in the featured section of News page in the homepage. Do you want to continue wth this process?') }}" />
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalSetTopNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="setTopNews" wire:loading.attr="disabled">
                    {{ __('Feature News in Newspage') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
<!--====  End of Set News as Top News Section comment  ====-->



<!--============================================================
=            Unset News as Top News Section comment            =
=============================================================-->
        <x-jet-dialog-modal wire:model="modalUnSetTopNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }} {{$newsId}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Continuing this process will enable this news to be displayed in the featured section of News page in the homepage. Do you want to continue wth this process?') }}" />
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalUnSetTopNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="unSetTopNews" wire:loading.attr="disabled">
                    {{ __('UnFeature News in Newspage') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
<!--====  End of Unset News as Top News Section comment  ====-->


<!--===============================================================================
=            Set News as Featured in Organization Page Section comment            =
================================================================================-->
<x-jet-dialog-modal wire:model="modalFeatureNewsInOrganizationPageFormVisible">
    <x-slot name="title">
        {{ __('News') }} {{$newsId}}
    </x-slot>
    <x-slot name="content">
        <div class="mt-4">
            <x-jet-label for="article_title" value="{{ __('Continuing this process will enable this news to be displayed in the featured section of News page in the homepage. Do you want to continue wth this process?') }}" />
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalFeatureNewsInOrganizationPageFormVisible')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-secondary-button class="ml-2" wire:click="featureInOrganizationPage" wire:loading.attr="disabled">
            {{ __('Feature News in Organization Page') }}
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
<!--====  End of Set News as Featured in Organization Page Section comment  ====-->

<!--=================================================================================
=            Unset News as Featured in Organization Page Section comment            =
==================================================================================-->
<x-jet-dialog-modal wire:model="modalUnFeatureNewsInOrganizationPageFormVisible">
    <x-slot name="title">
        {{ __('News') }} {{$newsId}}
    </x-slot>
    <x-slot name="content">
        <div class="mt-4">
            <x-jet-label for="article_title" value="{{ __('Continuing this process will disable this news to be displayed in the featured section of News page in the homepage. Do you want to continue wth this process?') }}" />
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalUnFeatureNewsInOrganizationPageFormVisible')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-secondary-button class="ml-2" wire:click="unFeatureInOrganizationPage" wire:loading.attr="disabled">
            {{ __('UnFeature News in Organization Page') }}
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
<!--====  End of Unset News as Featured in Organization Page Section comment  ====-->


















<!-- FINAL DIV -->
</div>
