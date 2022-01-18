<div class="p-6">
    <h2 class="table-title">Slider</h2>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        @if($userRoleString == 'Super Admin')
        <x-jet-button wire:click="createSlider">
            {{ __('Add Data in Slider') }}
        </x-jet-button>
        @else
        <p>{{$userRoleString}}</p>
        <x-jet-button wire:click="createOrgSlider">
            {{ __('Add Data in Organization Slider') }}
        </x-jet-button>
        @endif
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
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Article Content</th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Creation</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">News Link</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                @if($userRoleString == 'Super Admin')
                                    @if($getCarouselHomepage->count())
                                        @foreach($getCarouselHomepage as $item)
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
<!--                                                 <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->article_content }}
                                                </td> -->
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->created_at }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    <a href="{{ url($item->article_slug) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                                       {{ $item->article_slug }}
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    <x-jet-danger-button wire:click="deleteNewsShowModal({{ $item->articles_id }})">
                                                        {{__('Remove in Carousel')}}
                                                    </x-jet-danger-button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @else
                                    @if($getDisplayOrganizationArticleOnSelectModal->count())
                                        @foreach($getDisplayOrganizationArticleOnSelectModal as $item)
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
<!--                                                 <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->article_content }}
                                                </td> -->
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->created_at }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    <a href="{{ url($item->article_slug) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                                       {{ $item->article_slug }}
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    <x-jet-danger-button wire:click="deleteOrgNewsShowModal({{ $item->articles_id }})">
                                                        {{__('Remove in Carousel')}}
                                                    </x-jet-danger-button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if($userRoleString == 'Super Admin')
        {{$getCarouselHomepage->links()}}
    @else
        {{$getDisplayOrganizationArticleOnSelectModal->links()}}
    @endif









<x-jet-dialog-modal wire:model="modalAddNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">

                        <x-jet-label for="articleData" value="{{ __('Select Article to add in Homepage Slider') }}" />
                        <select wire:model="articleData" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($getDisplayArticleOnSelectModal as $articles)
                                <option value="{{$articles->articles_id}}">{{$articles->article_title}}</option>
                            @endforeach
                        </select>
                    


                    
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalAddNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="add" wire:loading.attr="disabled">
                    {{ __('add News') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>



<x-jet-dialog-modal wire:model="modalRemoveNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Are you sure you want to remove your news? Once your news is deleted, all of its resources and data will be permanently deleted. Do you wish to proceed?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalRemoveNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="remove" wire:loading.attr="disabled">
                    {{ __('remove News') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>










<x-jet-dialog-modal wire:model="modalOrganizationAddNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <p>world</p>
                        <x-jet-label for="articleOrgData" value="{{ __('Select Article to add in Homepage Slider') }}" />
                        <select wire:model="articleOrgData" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($getCarouselOrganization as $articleData)
                                <option value="{{$articleData->articles_id}}">{{$articleData->article_title}}</option>
                            @endforeach
                        </select>
                    
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalOrganizationAddNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="addOrg" wire:loading.attr="disabled">
                    {{ __('add News') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>






<x-jet-dialog-modal wire:model="modalRemoveOrgNewsFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Are you sure you want to remove your news? Once your news is deleted, all of its resources and data will be permanently deleted. Do you wish to proceed?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalRemoveOrgNewsFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="removeOrg" wire:loading.attr="disabled">
                    {{ __('remove News') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>



















</div>
