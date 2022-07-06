<!DOCTYPE html>
<html lang="en">
<div class="">
@extends('layouts.headlines')

@section('page-title','Article Create')

@livewire('admin-nav-bars')


<!-- component -->
<!-- This is an example component -->
<div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
    <div class="flex flex-col items-center justify-center relative">
        <div id="partnerCard"class="bg-[#1c1c1c] text-gray-50 overflow-hidden rounded-md max-w-sm p-2 min-h-[500px] flex flex-col">
            <div class="flex items-center justify-center bg-[#2a2a2a] min-h-[200px]">
                <a class="flex items-center justify-center" href={partner.Link} target="_blank" rel="noreferrer noopener">                          
                	@foreach($artImage as $image)
                		<img src="{{ asset('files/'.$image->file) }}" alt="EasyCode"class="w-full object-cover"/>
                	@endforeach 
                </a>
            </div>
            <div class="grid grid-cols-4">
                <div class="p-4 pr-0 text-lg col-span-3">
                	@foreach($artData as $art)
                    	<h4 class="font-bold">
                    	    {{$art->article_title}}
                    	</h4>
                    	<p class="text-gray-600 text-xs">{{$art->article_subtitle}}</p>
    	  				<p class="text-gray-700 text-base mb-4">
    	  				  <?php echo htmlspecialchars_decode(stripslashes($art->article_content));  ?>
    	  				</p>
                    @endforeach()
                </div>
            </div>
            <div class="mt-auto pl-4">
                @foreach($artData as $item)
            	<a href="{{ route('admin-articles.edit',$item->articles_id) }}">
                    <x-jet-button>
                        {{__('Update Article')}}
                    </x-jet-button>
                </a>
            	<a href="{{ url('admin-articles/updateImage',$item->articles_id) }}">
                	<x-jet-button>
                	    {{__('Edit Image')}}
                	</x-jet-button>
                </a>
                <div class="px-6 py-4 text-sm whitespace-no-wrap" style="@if($item->is_featured_in_newspage == 1)  
                                                                    background: rgba(25, 98, 181, 1);
                                                                @else
                                                                    background: rgba(173, 45, 16, 1.0);
                                                                @endif">
            	<a href="{{ route('admin-articles/featureNews',$item->articles_id) }}">
                    <x-jet-button>
                        {{__('Feature')}}
                    </x-jet-button>
                </a>
                <a href="{{ route('admin-articles/unfeatureNews',$item->articles_id) }}">
                    <x-jet-danger-button>
                        {{__('UnFeature')}}
                    </x-jet-danger-button>
                </div>
                </a>
                <div class="px-6 py-4 text-sm whitespace-no-wrap" style="@if($item->is_article_featured_home_page == 1)  
                                                                    background: rgba(25, 98, 181, 1);
                                                                @else
                                                                    background: rgba(173, 45, 16, 1.0);
                                                                @endif">
                    <a href="{{ route('admin-articles/setAsTopNews',$item->articles_id) }}">
                        <x-jet-button>
                            {{__('Set As Top News')}}
                        </x-jet-button>
                    </a>
                    <a href="{{ route('admin-articles/NotsetAsTopNews',$item->articles_id) }}">
                        <x-jet-danger-button>
                            {{__('Not Set as top News')}}
                        </x-jet-danger-button>
                    </a>
                </div>
                @endforeach
                <p>Option Buttons</p>
            </div>
        </div>
    </div>
</div>

@extends('layouts.closing-tag')
</div>
</html>

