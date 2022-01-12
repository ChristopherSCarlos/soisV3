<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>     
     <!--====================================================
     =            Homepage Views Section comment            =
     =====================================================-->
     @if($isCurrentSlugInSystemPage->contains($urlslug) or $urlslug == $isFrontPageSlugNull)
<div class="divide-y divide-gray-800 " x-data="{ show: false }">
     
     <div class="bg-img">
          <div class="front-container">
               <nav id="orgNav" class="flex items-center px-3 py-2 shadow-lg bg-red-800">
                    <div>
                         <button @click="show =! show" class="block h-8 mr-3 text-gray-400 items-center hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden">
                              <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                                   <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                                   <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                              </svg>
                         </button>
                    </div>
                    <div class="h-12 w-full flex items-center mr-3">
                         <a href="{{ url('/')}}" class="w-full">
                              <img class="h-8" src="{{ asset('image/svg/pup.svg') }}">
                         </a>
                    </div>
                    <div class="flex justify-end sm:w-8/12">
                         {{-- Top Navigation --}}
                         <ul class="hidden sm:flex sm:text-left text-gray-200 text-xs">
                              @foreach($getTopBarNav as $item)
                                   <a href="{{ url('/'.$item->slug) }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        {{ $item->label }}
                                   </a>
                              @endforeach
                              <a href="{{ url('news') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                   News
                              </a>
                              <div class="ml-3 relative">
                                  <x-jet-dropdown align="right" width="60">
                                      <x-slot name="trigger">
                                          <span class="inline-flex rounded-md">
                                              <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                                  Organization
                                                  <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                      <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                  </svg>
                                              </button>
                                          </span>
                                      </x-slot>
                                      <x-slot name="content">
                                          <div class="w-60">
                                              <!-- Team Management -->
                                              <div class="block px-4 py-2 text-xs text-gray-400">
                                                  {{ __('PUP ORGANIZATIONS') }}
                                              </div>
                                              <!-- Team Settings -->
                                              @foreach($orgLinks as $orgWebLinks)
                                                  <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                                      {{ $orgWebLinks->organization_name }}
                                                  </x-jet-dropdown-link>
                                              @endforeach
                                              <div class="border-t border-gray-100"></div>
                                          </div>
                                      </x-slot>
                                  </x-jet-dropdown>
                              </div>
                              <a href="{{ url('/login') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-red-900 transition text-yellow-100">
                                Login
                              </a>
                         </ul>
                    </div>
               </nav>
               <aside class="sm:hidden bg-gray-900 text-gray-700 divide-y divide-gray-700 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
                    {{-- Desktop Web View --}}
                    <ul class="hidden text-gray-200 text-xs sm:block sm:text-left">
                         @foreach($getTopBarNav as $item)
                              <a href="{{ url('/'.$item->slug) }}">
                                   {{ $item->label }}
                              </a>
                         @endforeach
                     </ul>
                     {{-- Mobile Web View --}}
                     <div :class="show ? 'block' : 'hidden'" class="pb-3 divide-y divide-gray-800 block sm:hidden">
                         <ul class="text-gray-200 text-xs">
                              @foreach($getTopBarNav as $item)
                                   <a href="{{ url('/'.$item->slug) }}" class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                        <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                             {{ $item->label }}
                                        </li>
                                   </a>
                              @endforeach
                         </ul>
                         <ul>
                              <div class="ml-3 relative">
                                   <x-jet-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                             <span class="inline-flex rounded-md">
                                                  <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                                       Organization
                                                       <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                       </svg>
                                                  </button>
                                             </span>
                                        </x-slot>
                                        <x-slot name="content">
                                             <div class="w-60">
                                                  <!-- Team Management -->
                                                  <div class="block px-4 py-2 text-xs text-gray-400">
                                                      {{ __('PUP ORGANIZATIONS') }}
                                                  </div>
                                                  <!-- Team Settings -->
                                                  @foreach($orgLinks as $orgWebLinks)
                                                      <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                                          {{ $orgWebLinks->organization_name }}
                                                      </x-jet-dropdown-link>
                                                  @endforeach
                                                  <div class="border-t border-gray-100"></div>
                                             </div>
                                        </x-slot>
                                   </x-jet-dropdown>
                              </div>
                         </ul>
                         {{-- Top Navigation Mobile Web View --}}
                         <ul class="text-gray-200 text-xs">
                             <a href="{{ url('/login') }}">
                                 <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">Login</li>
                             </a>
                         </ul>
                    </div>
               </aside>
          </div>


          @if($urlslug != null)
          <p>hello</p>
          @foreach($getDisplayCurrentWebPageOnHomepage as $selectedCurrentHomepageData)
          <div class="frontpage-title-container">
               <div class="frontpage-title-logo-container">
                    <img class="frontpage-title-image opacity-70 hover:opacity-100 transition duration-500 ease-in-out" src="{{ asset('image/svg/pup.svg') }}">
               </div>
               <div class="frontpage-title-title-container">
                    <p class="frontpage-title-title">{{ $selectedCurrentHomepageData->title }}</p>
               </div>
          </div>
          <!--====  End of Homepage Landing Page Title Section comment  ====-->


          <!--===================================================================
          =            Homepage Landing Page Content Section comment            =
          ====================================================================-->
          @if($selectedCurrentHomepageData->content)
          <div class="" style="">
               <?php echo htmlspecialchars_decode(stripslashes($selectedCurrentHomepageData->content));  ?>
          </div>
          @endif
          
          @endforeach
          @else
          <!--================================================================
          =            Homepage Landing Page Title Section comment            =
          =================================================================-->
          @foreach($isWebpageHomepage as $homepageData)
          <div class="frontpage-title-container">
               <div class="frontpage-title-logo-container">
                    <img class="frontpage-title-image opacity-70 hover:opacity-100 transition duration-500 ease-in-out" src="{{ asset('image/svg/pup.svg') }}">
               </div>
               <div class="frontpage-title-title-container">
                    <p class="frontpage-title-title">{{ $homepageData->title }}</p>
               </div>
          </div>
          <!--====  End of Homepage Landing Page Title Section comment  ====-->


          <!--===================================================================
          =            Homepage Landing Page Content Section comment            =
          ====================================================================-->
          @if($homepageData->content)
          <div class="" style="height: 100vh;">
               <?php echo htmlspecialchars_decode(stripslashes($homepageData->content));  ?>
          </div>
          @endif
          
          @endforeach
          @endif
          <!--=========================================================================
          =            Homepage Announcements Page Content Section comment            =
          ==========================================================================-->
          @if($getAnnouncementsOnHomepage != null)
                    <h2 style="font-family: 'Exo 2',sans-serif; font-size: 250%;color:white; margin-top: 10%;">Announcements</h2>
                    <hr>
          <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 mt-5 mb-5" style="">
               @foreach($getAnnouncementsOnHomepage as $announcementsData)
                         <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                              <div class="latest-latest-news-text-nine">
                                  <h5 class="text-center">{{$announcementsData->announcement_title}}</h5>
                              </div>
                              <p>{{$announcementsData->announcement_content}}</p>
                         </div>
               @endforeach
          </div>
          @endif
          
          <!--====  End of Homepage Announcements Page Content Section comment  ====-->
          
          <!--===========================================================
          =            Homepage LLatest News Section comment            =
          ============================================================-->
          <h2 style="font-family: 'Exo 2',sans-serif; font-size: 250%;color:white; margin-top: 10%;">Featured News</h2>
          <hr>
          <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDisplayLandingPageHomepage as $featuredNews)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                    <a href="{{$featuredNews->article_slug}}">
                        <div class="latest-latest-news-image-nine">
                            @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                @if($newsImage->articles_id == $featuredNews->articles_id)
                                    <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$featuredNews->article_title}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
          
          
          <!--====  End of Homepage LLatest News Section comment  ====-->
          
          <!--=====================================================
          =            Events Homepage Section comment            =
          ======================================================-->
          <h2 style="font-family: 'Exo 2',sans-serif; font-size: 250%; color:white; margin-top: 10%;">Featured Events</h2>
          <hr>
          <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" style="margin-bottom: 5%;">
                @foreach($getDisplayEventsHomepage as $homepageEvents)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                    <div class="latest-latest-news-image-nine">
                            @foreach($getDisplayEventsAssetData as $newsImage)
                                @if($newsImage->events_id == $homepageEvents->event_id)
                                    <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$homepageEvents->name_of_activity}}</h5>
                        </div>
                </div>
                @endforeach
            </div>
          
          
          <!--====  End of Events Homepage Section comment  ====-->
          @livewire('footers')
          
          <!--====  End of Homepage Landing Page Content Section comment  ====-->
          
    </div>
</div>

     @endif
     
     
     
     <!--====  End of Homepage Views Section comment  ====-->
     


<!--=======================================================
=            Newspage Homepage Section comment            =
========================================================-->
@if($urlslug == 'news')
<div class="divide-y divide-gray-800 " x-data="{ show: false }">
     
     <div class="">
          <div class="">
               <nav id="orgNav" class="flex items-center px-3 py-2 shadow-lg bg-red-800">
                    <div>
                         <button @click="show =! show" class="block h-8 mr-3 text-gray-400 items-center hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden">
                              <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                                   <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                                   <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                              </svg>
                         </button>
                    </div>
                    <div class="h-12 w-full flex items-center mr-3">
                         <a href="{{ url('/')}}" class="w-full">
                              <img class="h-8" src="{{ asset('image/svg/pup.svg') }}">
                         </a>
                    </div>
                    <div class="flex justify-end sm:w-8/12">
                         {{-- Top Navigation --}}
                         <ul class="hidden sm:flex sm:text-left text-gray-200 text-xs">
                              @foreach($getTopBarNav as $item)
                                   <a href="{{ url('/'.$item->slug) }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        {{ $item->label }}
                                   </a>
                              @endforeach
                              <a href="{{ url('news') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                   News
                              </a>
                              <div class="ml-3 relative">
                                  <x-jet-dropdown align="right" width="60">
                                      <x-slot name="trigger">
                                          <span class="inline-flex rounded-md">
                                              <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                                  Organization
                                                  <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                      <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                  </svg>
                                              </button>
                                          </span>
                                      </x-slot>
                                      <x-slot name="content">
                                          <div class="w-60">
                                              <!-- Team Management -->
                                              <div class="block px-4 py-2 text-xs text-gray-400">
                                                  {{ __('PUP ORGANIZATIONS') }}
                                              </div>
                                              <!-- Team Settings -->
                                              @foreach($orgLinks as $orgWebLinks)
                                                  <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                                      {{ $orgWebLinks->organization_name }}
                                                  </x-jet-dropdown-link>
                                              @endforeach
                                              <div class="border-t border-gray-100"></div>
                                          </div>
                                      </x-slot>
                                  </x-jet-dropdown>
                              </div>
                              <a href="{{ url('/login') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-red-900 transition text-yellow-100">
                                Login
                              </a>
                         </ul>
                    </div>
               </nav>
               <aside class="sm:hidden bg-gray-900 text-gray-700 divide-y divide-gray-700 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
                    {{-- Desktop Web View --}}
                    <ul class="hidden text-gray-200 text-xs sm:block sm:text-left">
                         @foreach($getTopBarNav as $item)
                              <a href="{{ url('/'.$item->slug) }}">
                                   {{ $item->label }}
                              </a>
                         @endforeach
                     </ul>
                     {{-- Mobile Web View --}}
                     <div :class="show ? 'block' : 'hidden'" class="pb-3 divide-y divide-gray-800 block sm:hidden">
                         <ul class="text-gray-200 text-xs">
                              @foreach($getTopBarNav as $item)
                                   <a href="{{ url('/'.$item->slug) }}" class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                        <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                             {{ $item->label }}
                                        </li>
                                   </a>
                              @endforeach
                         </ul>
                         <ul>
                              <div class="ml-3 relative">
                                   <x-jet-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                             <span class="inline-flex rounded-md">
                                                  <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                                       Organization
                                                       <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                       </svg>
                                                  </button>
                                             </span>
                                        </x-slot>
                                        <x-slot name="content">
                                             <div class="w-60">
                                                  <!-- Team Management -->
                                                  <div class="block px-4 py-2 text-xs text-gray-400">
                                                      {{ __('PUP ORGANIZATIONS') }}
                                                  </div>
                                                  <!-- Team Settings -->
                                                  @foreach($orgLinks as $orgWebLinks)
                                                      <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                                          {{ $orgWebLinks->organization_name }}
                                                      </x-jet-dropdown-link>
                                                  @endforeach
                                                  <div class="border-t border-gray-100"></div>
                                             </div>
                                        </x-slot>
                                   </x-jet-dropdown>
                              </div>
                         </ul>
                         {{-- Top Navigation Mobile Web View --}}
                         <ul class="text-gray-200 text-xs">
                             <a href="{{ url('/login') }}">
                                 <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">Login</li>
                             </a>
                         </ul>
                    </div>
               </aside>
          </div>
     </div>
</div>


<!--===================================================
=            Featured News Section comment            =
====================================================-->
@foreach($getTopNewsArticleOnCreatedPage as $topNews)
<div class="newspage-container grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1" style="background: #1a1b1b; color: white; height">
         <div class="newspage-featured-top flex flex-wrap justify-center align-items p-6" style="margin:auto;">
    <a href="{{$topNews->article_slug}}">
              <p class="news-title-text">{{$topNews->article_title}}</p>
    </a>
          </div>
          <div class="newspage-featured-top flex flex-wrap justify-center align-items" style="margin:auto;">
              <div class="flex flex-wrap justify-center align-items p-6" style="margin:auto; padding: 4em;">
                  <div>
                      @foreach($getDisplaySelectedNewsImageData as $newsImage)
                          @if($newsImage->articles_id == $topNews->articles_id)
                              <img style="object-fit:cover; height:80%;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                      @endif
                  @endforeach
                  </div>
              </div>
          </div>
</div>
@endforeach
<!--====  End of Featured News Section comment  ====-->

<!--=================================================
=            Latest News Section comment            =
==================================================-->
<div style="">
    <div class="frontpage-newspage-title mt-5 mb-5" style="border-style: none;">
        <p class="text-center">LATEST NEWS</p>
    </div>
    
    <div class="latest-news-container ml-5 mr-5 p-6" style="border-color: red; border-style: none;" data-aos="fade-right">
        <!-- component -->
        <div class="news-container grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1" >
            <div class="latest-latest-news-image-first">
                @foreach($getDisplaySelectedNewsImageData as $newsImage)
                    @if($newsImage->articles_id == $getDsiplayArticleLatestOnCreatedPage->articles_id)
                        <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                    @endif
                @endforeach
            </div>
            <a href="{{$getDsiplayArticleLatestOnCreatedPage->article_slug}}">
                <div class="latest-latest-news-text-first">
                    <h2 class="text-center">{{$getDsiplayArticleLatestOnCreatedPage->article_title}}</h2>
                </div>
            </a>
        </div>
    </div>

    <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDsiplayArticleDataOnCreatedPage as $latestNews)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                    <a href="{{$latestNews->article_slug}}">
                        <div class="latest-latest-news-image-nine">
                            @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                @if($newsImage->articles_id == $latestNews->articles_id)
                                    <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$latestNews->article_title}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>


</div>
<!--====  End of Latest News Section comment  ====-->
<!--===================================================
=            Featured News Section comment            =
====================================================-->
<div style="border-style: none; background: #1a1b1b;">
    <div style="border-style:none;">
    <div class="frontpage-newspage-title mt-5 mb-5" style="border-style: none;">
        <div style="-webkit-filter: brightness(100%); cursor: pointer;">
            <p class="text-center" style="border-style:none;">FEATURED NEWS</p>
        </div>
    </div>    
</div>

<div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDsiplayFeaturedArticleOnCreatedPage as $featuredArticles)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                    <a href="{{$featuredArticles->article_slug}}">
                        <div class="latest-latest-news-image-nine">
                            @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                @if($newsImage->articles_id == $featuredArticles->articles_id)
                                    <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$featuredArticles->article_title}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

</div>


<!--====  End of Featured News Section comment  ====-->



@livewire('footers')

@endif
<!--====  End of Newspage Homepage Section comment  ====-->


<!--===========================================================
=            Selected News Article Section comment            =
============================================================-->
@if($getDisplaySelectedNewsArticle->contains($urlslug))
<div class="">
  <div class="">
    <nav id="" class="flex items-center px-3 py-2 shadow-lg" style="background: maroon;">
                <div>
                    <button @click="show =! show" class="block h-8 mr-3 text-gray-400 items-center hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden">
                        <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                            <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                            <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                        </svg>
                    </button>
                </div>
                <div class="h-12 w-full flex items-center mr-3">
                    <a href="{{ url('/')}}" class="w-full">
                        <img class="h-8" src="{{ asset('image/svg/pup.svg') }}">
                    </a>
                </div>
                <div class="flex justify-end sm:w-8/12">
                    {{-- Top Navigation --}}
                    <ul class="hidden sm:flex sm:text-left text-gray-200 text-xs">
                            @foreach($getTopBarNav as $item)
                                <a href="{{ url('/'.$item->slug) }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                    {{ $item->label }}
                                </a>
                            @endforeach
                            <a href="{{ url('news') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                News
                            </a>

                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        Organization
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('PUP ORGANIZATIONS') }}
                                    </div>
                                    <!-- Team Settings -->
                                    @foreach($orgLinks as $orgWebLinks)
                                        <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                            {{ $orgWebLinks->organization_name }}
                                        </x-jet-dropdown-link>
                                    @endforeach
                                    <div class="border-t border-gray-100"></div>

                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <a href="{{ url('/login') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-red-900 transition text-yellow-100">
                      Login
                    </a>
                    </ul>
                </div>
            </nav>

            <aside class="sm:hidden bg-gray-900 text-gray-700 divide-y divide-gray-700 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
                {{-- Desktop Web View --}}
                <ul class="hidden text-gray-200 text-xs sm:block sm:text-left">
                    @foreach($getTopBarNav as $item)
                        <a href="{{ url('/'.$item->slug) }}">
                            {{ $item->label }}
                        </a>
                    @endforeach


                </ul>
                {{-- Mobile Web View --}}
                <div :class="show ? 'block' : 'hidden'" class="pb-3 divide-y divide-gray-800 block sm:hidden">
                    <ul class="text-gray-200 text-xs">
                        @foreach($getTopBarNav as $item)
                            <a href="{{ url('/'.$item->slug) }}" class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                    {{ $item->label }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                    <ul>
                        <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        Organization
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('PUP ORGANIZATIONS') }}
                                    </div>
                                    <!-- Team Settings -->
                                    @foreach($orgLinks as $orgWebLinks)
                                        <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                            {{ $orgWebLinks->organization_name }}
                                        </x-jet-dropdown-link>
                                    @endforeach
                                    <div class="border-t border-gray-100"></div>

                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    </ul>
                    {{-- Top Navigation Mobile Web View --}}
                    <ul class="text-gray-200 text-xs">
                        <a href="{{ url('/login') }}">
                            <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">Login</li>
                        </a>
                    </ul>
                </div>
            </aside>

  </div>
</div>



@foreach($getDisplaySelectedNewsArticleData as $articleSelectedData)
     @if($articleSelectedData->article_slug == $urlslug)
          <div class="grid grid-rows-2" style="">
               <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mb-5" style="background: #1a1b1b; height:100vh;">
                    <div style="">
                         <div class="flex flex-col flex-wrap items-center justify-center" style="height: 100vh;">
                         @foreach($getDisplaySelectedNewsImageDataOnSelectedNews as $data)
                              <img style="max-height: 100%;object-fit: contain;" src="{{asset('files/'.$data->asset_name)}}">
                         @endforeach
                         </div>
                    </div>
                    <div class="flex flex-col flex-wrap items-center justify-center text-center" style="color:white;">
                         <p>{{$articleSelectedData->article_title}}</p>
                    </div>
               </div>
               <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" style="">
                    <div><p></p></div>
                    <div class="col-span-2">
                         <div>
                              <p><?php echo htmlspecialchars_decode(stripslashes($articleSelectedData->article_content));  ?></p>
                         </div>
                    </div>
                    <div><p></p></div>
               </div>
          </div>
     @endif
@endforeach

<hr>
<div class="" style="background:#262626;">
        <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDsiplayArticleDataOnCreatedPage as $latestNews)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                    <a href="{{$latestNews->article_slug}}">
                        <div class="latest-latest-news-image-nine">
                            @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                @if($newsImage->articles_id == $latestNews->articles_id)
                                    <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$latestNews->article_title}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

</div>



@livewire('footers')







@endif
<!--====  End of Selected News Article Section comment  ====-->


<!--==========================================================
=            Organization WebPage Section comment            =
===========================================================-->
@if($getDisplaySelectedOrganization->contains($urlslug))
     @foreach($getDisplaySelectedOrganizationAssetBannerData as $organizationBannerData)
          <div id="org-bacground-image" style="background: linear-gradient(to bottom, transparent, #030202), url('{{ asset('files/' . $organizationBannerData->asset_name) }}');">
     @endforeach
     @foreach($getDisplaySelectedOrganizationInterfaceBannerData as $organizationUI)
          <div class="container">
               <nav id="" class="flex items-center px-3 py-2 shadow-lg" style="background: linear-gradient(to left,{{$organizationUI->organization_secondary_color}}66, {{$organizationUI->organization_primary_color}}66);">
                    <div>
                         <button @click="show =! show" class="block h-8 mr-3 text-gray-400 items-center hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden">
                              <svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                                   <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                                   <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                              </svg>
                         </button>
                    </div>
                    <div class="h-12 w-full flex items-center mr-3">
                         <a href="{{ url('/')}}" class="w-full">
                              <img class="h-8" src="{{ asset('image/svg/pup.svg') }}">
                         </a>
                    </div>
                    <div class="flex justify-end sm:w-8/12">
                         {{-- Top Navigation --}}
                         <ul class="hidden sm:flex sm:text-left text-gray-200 text-xs">
                              @foreach($getTopBarNav as $item)
                                   <a href="{{ url('/'.$item->slug) }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        {{ $item->label }}
                                   </a>
                              @endforeach
                              <a href="{{ url('news') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                   News
                              </a>
                              <div class="ml-3 relative">
                                   <x-jet-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                             <span class="inline-flex rounded-md">
                                                  <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                                       Organization
                                                       <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                       </svg>
                                                  </button>
                                             </span>
                                        </x-slot>
                                        <x-slot name="content">
                                             <div class="w-60">
                                                  <!-- Team Management -->
                                                  <div class="block px-4 py-2 text-xs text-gray-400">
                                                       {{ __('PUP ORGANIZATIONS') }}
                                                  </div>
                                                  @foreach($orgLinks as $orgWebLinks)
                                                       <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                                            {{ $orgWebLinks->organization_name }}
                                                       </x-jet-dropdown-link>
                                                  @endforeach
                                                  <div class="border-t border-gray-100"></div>
                                             </div>
                                        </x-slot>
                                   </x-jet-dropdown>
                              </div>
                              <a href="{{ url('/login') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-red-900 transition text-yellow-100">
                                   Login
                              </a>
                         </ul>
                    </div>
               </nav>
     
               <aside class="sm:hidden bg-gray-900 text-gray-700 divide-y divide-gray-700 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
                    {{-- Desktop Web View --}}
                    <ul class="hidden text-gray-200 text-xs sm:block sm:text-left">
                         @foreach($getTopBarNav as $item)
                              <a href="{{ url('/'.$item->slug) }}">
                                   {{ $item->label }}
                              </a>
                         @endforeach
                    </ul>
                    {{-- Mobile Web View --}}
                    <div :class="show ? 'block' : 'hidden'" class="pb-3 divide-y divide-gray-800 block sm:hidden">
                         <ul class="text-gray-200 text-xs">
                              @foreach($getTopBarNav as $item)
                                   <a href="{{ url('/'.$item->slug) }}" class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                        <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">
                                           {{ $item->label }}
                                        </li>
                                   </a>
                              @endforeach
                         </ul>
                         <ul>
                              <div class="ml-3 relative">
                                   <x-jet-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                             <span class="inline-flex rounded-md">
                                                  <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                                       Organization
                                                       <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                           <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                       </svg>
                                                  </button>
                                             </span>
                                        </x-slot>
                                        <x-slot name="content">
                                             <div class="w-60">
                                                  <!-- Team Management -->
                                                  <div class="block px-4 py-2 text-xs text-gray-400">
                                                      {{ __('PUP ORGANIZATIONS') }}
                                                  </div>
                                                  <!-- Team Settings -->
                                                  @foreach($orgLinks as $orgWebLinks)
                                                      <x-jet-dropdown-link href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">
                                                          {{ $orgWebLinks->organization_name }}
                                                      </x-jet-dropdown-link>
                                                  @endforeach
                                                  <div class="border-t border-gray-100"></div>
                                             </div>
                                        </x-slot>
                                   </x-jet-dropdown>
                              </div>
                         </ul>
                          {{-- Top Navigation Mobile Web View --}}
                         <ul class="text-gray-200 text-xs">
                             <a href="{{ url('/login') }}">
                                 <li class="cursor-pointer px-4 py-2 hover:bg-gray-800">Login</li>
                             </a>
                         </ul>
                    </div>
               </aside>
    @foreach($getDisplaySelectedOrganizationAssetLogoData as $organizationLogo)
         <div class="flex flex-col flex-wrap justify-center align-items" style="height:100vh;">
            <div class="org-logo-placeholder" style="">
                <img class="org-logo-image" style="" src="{{ asset('files/' . $organizationLogo->asset_name) }}">
            </div>
            <div class="" style="margin:0px auto auto auto;">
                <p class="organization-title" style="color: white">{{$organizationUI->organization_name}}</p>
            </div>
         </div>
    @endforeach

          </div>
</div>
    

<div class="pt-5" style="background: #030202;">
    <div data-aos="fade-right" >
        <p style="color: white; font-size: 100px;">Announcements</p>
    </div>
    <div data-aos="fade-right">
     <hr>
        <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDisplayAnnouncementData as $orgAnnouncement)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$orgAnnouncement->announcement_title}}</h5>
                        </div>
                </div>
                @endforeach
            </div>
    </div>
</div>

<div style="background: #030202;">
    <div data-aos="fade-right" >
        <p style="color: white; font-size: 100px;">Articles</p>
    </div>
    <div data-aos="fade-right">
        <hr>
        <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDisplayArticleData as $orgArticle)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                    <a href="/{{$orgArticle->article_slug}}">
                        <div class="latest-latest-news-image-nine">
                            @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                @if($newsImage->articles_id == $orgArticle->articles_id)
                                    <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                @endif
                            @endforeach
                        </div>
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$orgArticle->article_title}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
    </div>
</div>

<div style="background: #030202;">
    <div data-aos="fade-right" >
        <p style="color: white; font-size: 100px;">Events</p>
    </div>
    <div data-aos="fade-right">
        <hr>
        <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDisplayEventsData as $orgEvents)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$orgEvents->name_of_activity}}</h5>
                        </div>
                </div>
                @endforeach
            </div>
    </div>
</div>

@endforeach



@endif
<!--====  End of Organization WebPage Section comment  ====-->











<!-- FINAL DIV -->
</div>
