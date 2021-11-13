<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>     
     <!--====================================================
     =            Homepage Views Section comment            =
     =====================================================-->
     @if($isCurrentSlugInSystemPage->contains($urlslug) or $urlslug == $isFrontPageSlugNull)
     
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
     <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
          <div class="p-4 flex flex-row items-center justify-between">
               <a href="{{ url('/')}}" class="flex text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <img class="h-8" src="{{ asset('image/svg/pup.svg') }}">
                    <p class="ml-2">Student Organization Information System</p>
               </a>
               <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                         <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                         <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
               </button>
          </div>
          <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
               <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Home</a>
               <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/news">News</a>
               <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Contact</a>
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

               <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ url('/login') }}">Login</a>    
          </nav>
     </div>
</div>

<div class="sliding-announcement-wrap">
    <div class="sliding-announcement">

          @foreach($getDisplayArticlesOnHomepageCarousel as $HomepageNews)
          <a href="{{$HomepageNews->article_slug}}">
              <div class="sliding-annonuncement-image-container">
                    @foreach($getDisplaySelectedNewsImageData as $newsImage)
                        @if($newsImage->articles_id == $HomepageNews->articles_id)
                            <img class="sliding-annonuncement-image" src="{{ asset('files/'.$newsImage->asset_name) }}">
                        @endif
                    @endforeach
                  <h5 class="text-center"></h5>
               <div style="position: absolute; top: 90%; bottom: 0%; background: rgba(33, 38, 38, .8); width: 100%;"><p style="color: rgba(255, 255, 255, 1.0);">{{$HomepageNews->article_title}}</p></div>
              </div>
          </a>
     @endforeach

    </div>

    <button class="button-slider slide-arrow prev-arrow"></button>
    <button class="button-slider slide-arrow next-arrow"></button>
</div>


<div id="logo-wrapper" class="logo-slider" style="padding-top: 5px; padding-bottom: 5px; background: rgba(143, 143, 143, .8);">
     @foreach($getDisplayOrganizationsLogoOnHomepage as $orgsliderLogos)
          <div class="logo-container" style="margin: 10%;">
          <img class="logo-image" style="object-fit:fill; height:100%;  filter: grayscale(100%); margin: auto;" src="{{ asset('files/'.$orgsliderLogos->asset_name) }}">
     </div>     
     @endforeach
</div>


<div class="frontpage-title-container grid grid-cols-3">
     <button onclick="openDiv1()">
          <div id="openDivHolder1">
               <h2 id="openDivTitle1" class="frontpage-title-title">Latest Announcements</h2>
          </div>
     </button>
     <button onclick="openDiv2()">
          <div id="openDivHolder2">
               <h2 id="openDivTitle2" class="frontpage-title-title">Latest News</h2>
          </div>
     </button>
     <button onclick="openDiv3()">
          <div id="openDivHolder3">
               <h2 id="openDivTitle3" class="frontpage-title-title">Latest Events</h2>
          </div>
     </button>
</div>


<div id="appearingHomepageAnnouncementDIV">
     <div class="homepage-apearing-divs">
          <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2">
               @foreach($getDisplayAnnouncementFeaturedHomepage as $HomepageAnnouncement)
               <div>
                    <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0">
                         <a href="/">
                             <div class="latest-latest-news-image-nine">
                                   <img style="object-fit:cover" src="{{ asset('image/c1.jpg') }}">
                             </div>
                             <div class="latest-latest-news-text-nine">
                                 <h5 class="text-center">{{$HomepageAnnouncement->announcement_title}}</h5>
                             </div>
                         </a>
                    </div>
               </div>
               @endforeach
          </div>
     </div>
</div>

<div id="appearingHomepageNewsArticleDIV">
     <div class="homepage-apearing-divs">
          <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2">
               @foreach($getDisplayLandingPageHomepage as $HomepageNews)
               <div>
                    <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0">
                         <a href="/">
                             <div class="latest-latest-news-image-nine">
                                   @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                       @if($newsImage->articles_id == $HomepageNews->articles_id)
                                           <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                       @endif
                                   @endforeach
                             </div>
                             <div class="latest-latest-news-text-nine">
                                 <h5 class="text-center">{{$HomepageNews->article_title}}</h5>
                             </div>
                         </a>
                    </div>
               </div>
               @endforeach
          </div>

     </div>
</div>

<div id="appearingHomepageEventsDIV">
     <div class="homepage-apearing-divs">
          <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2">
               @foreach($getDisplayEventsHomepage as $HomepageEvents)
                    <div>
                         <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0">
                              <a href="/">
                                  <div class="latest-latest-news-image-nine">
                                        @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                            @if($newsImage->articles_id == $HomepageEvents->event_id)
                                                <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                            @endif
                                        @endforeach
                                  </div>
                                  <div class="latest-latest-news-text-nine">
                                      <h5 class="text-center">{{$HomepageEvents->name_of_activity}}</h5>
                                  </div>
                              </a>
                         </div>
                    </div>
               @endforeach
          </div>
     </div>
</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br>

@livewire('footers')



          <!--====  End of Homepage Landing Page Content Section comment  ====-->
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
