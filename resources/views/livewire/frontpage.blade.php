<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>     
     <!--====================================================
     =            Homepage Views Section comment            =
     =====================================================-->
     @if($isCurrentSlugInSystemPage->contains($urlslug) or $urlslug == $isFrontPageSlugNull)
     @section('title', 'Homepage')
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

<div class=" mb-6" style="background:#2A0001; color:#ffe004;">
          <div class="homepage-news-bar">
               @foreach($getDisplayAnnouncementFeaturedHomepage as $HomepageAnnouncement)
                    <a href="{{$HomepageAnnouncement->announcement_title}}">
                         <div class="flex flex-row justify-center items-center" style="">
                              <h5 class="text-center" style=" ">{{$HomepageAnnouncement->announcement_title}}</h5>
                              <img class="h-5 ml-5 mr-5" src="{{ asset('image/svg/pup.svg') }}">
                         </div>
                    </a>
               @endforeach
          </div>
</div>

<div class="sliding-announcement-wrap-homepage">
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



<div class="grid grid-cols-12 bg-gray-200">
     <div class=""></div>
     <div class="col-span-3  h-5/6 mt-4">
          <div class="flex flex-row">
               <div><p class="homepage-titles"><strong>Latest Announcements</strong></p></div>

          </div>
          <div class="" style="overflow:auto;">
          @foreach($getDisplayAnnouncementFeaturedHomepage as $HomepageAnnouncement)
               <div class="annonuncement-links-homepage mt-5 bg-gray-200 hover:bg-gray-600">
                    <a class="bg-gray-200 hover:bg-gray-600 hover:text-white" href="{{$HomepageAnnouncement->announcement_title}}">
                         <h2 class="text-left text-4x1 font-medium">{{$HomepageAnnouncement->announcement_title}}</h2>
                         <h5 class="text-left text-xs font-light">{{\Carbon\Carbon::parse($HomepageAnnouncement->created_at)->isoFormat('MMM Do YYYY')}}</h5>
                    </a>
               </div>
          @endforeach
          </div>
     </div>
     <div class="col-span-7  h-5/6 mt-4">
          
          <div class="flex flex-row">
               <div><p class="homepage-titles"><strong>Latest News</strong></p></div>
          </div>
          <div class="flex align-items justify-center" data-aos="fade-right">
               <div class="row" style="width:80%;">
                    <div class="column small-11 small-centered" style="background: #9CA3AF;">
                         <div class="slider slider-single" >
                                   @foreach($getDisplayFeaturedArticlesOnHomepage as $orgNews)
                              <div class="grid grid-cols-2" style="background: #1F2937;">
                                       <div class="flex justify-center items-center bg-white-800" style="">
                                             @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                                 @if($newsImage->articles_id == $orgNews->articles_id)
                                                     <img class="organization-latest-news-slider" style="object-fit:fill; height: 50vh;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                                 @endif
                                             @endforeach
                                       </div>
                                       <div class="bg-white-800" style="color: white;">{{$orgNews->article_title}}</div>
                              </div>
                                   @endforeach
                         </div>
                         <div class="slider slider-nav" >
                                   @foreach($getDisplayFeaturedArticlesOnHomepage as $orgNews)
                                       <div class="organization-latest-news-slider-container flex justify-center items-center flex-row mt-1 p-2">
                                             @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                                 @if($newsImage->articles_id == $orgNews->articles_id)
                                                     <div class="ml-2 mr-2">
                                                          <img class="organization-latest-news-slider transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height: 7vh;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                                     </div>
                                                 @endif
                                             @endforeach
                                       </div>
                                   @endforeach
                         </div>
                         <button class="homepage-button-slider homepage-slide-arrow homepage-prev-arrow"></button>
                         <button class="homepage-button-slider homepage-slide-arrow homepage-next-arrow"></button>
                    </div>
               </div>
          </div>
     </div>
     <div class=""></div>
</div>

<div class="grid grid-rows-2 " style="background: #0d0c0d; color:white;">
     <div class="text-center"><p class="homepage-titles"><strong>Featured Events</strong></p></div>
</div>
<div class=" p-6 flex justify-center items-center" style="background: #0d0c0d;width: 100%; color:white;">
     <div class=" mb-6"  style="width:95% ;">
          <div class="homepage-events-slick">
               @foreach($getDisplayEventsHomepage as $HomepageEvents)
                    <div>
                    <a href="{{$HomepageEvents->article_slug}}">
                        <div class="mr-5 ml-5 pl-5 pr-5 flex flex-col">
                              <div class="flex align-items justify-center items-center">
                              @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                   @if($newsImage->articles_id == $HomepageEvents->articles_id)
                                        <div class="ml-2 mr-2">
                                             <img class=" transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height:20vh; width: 15vw;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                        </div>
                                   @endif
                              @endforeach
                              </div>
                              <div class="" style="">
                                   <h5 class="text-center text-sm" style="width: 15vw;">{{$HomepageEvents->article_title}}</h5>
                              </div>
                        </div>
                    </a>
                    </div>
               @endforeach
          </div>
     </div>
</div>

<div style="height:100vh;">
     <div class="text-center"><p>Quick Links</p></div>
     <div class="grid grid-cols-3">
          <div>GPOA</div>
          <div>MEMBERSHIP</div>
          <div>RUSSEL</div>
     </div>

</div>

@livewire('footers')



          <!--====  End of Homepage Landing Page Content Section comment  ====-->
     @endif
     
     
     
     <!--====  End of Homepage Views Section comment  ====-->
     


<!--=======================================================
=            Newspage Homepage Section comment            =
========================================================-->
@if($urlslug == 'news')
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
    <div class="grid grid-cols-3">
          @foreach($getDiplayLatestSixArticleOnNewsPage as $latestSixNews)
          <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
              <a href="{{$latestSixNews->article_slug}}">
                  <div class="latest-latest-news-image-nine">
                      @foreach($getDisplaySelectedNewsImageData as $newsImage)
                          @if($newsImage->articles_id == $latestSixNews->articles_id)
                              <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                          @endif
                      @endforeach
                  </div>
                  <div class="latest-latest-news-text-nine">
                      <h5 class="text-center">{{$latestSixNews->article_title}}</h5>
                  </div>
              </a>
          </div>
          @endforeach
    </div>
<div class=" p-6 flex justify-center items-center" style="background: #0d0c0d;width: 100%; color:white;" data-aos="fade-right">
     <div class=" mb-6"  style="width:95% ;">
          <div class="homepage-events-slick">
               @foreach($getDsiplayArticleDataOnCreatedPage as $NewsPageLatestNews)
                    <div>
                    <a href="{{$NewsPageLatestNews->article_slug}}">
                        <div class="mr-5 ml-5 pl-5 pr-5 flex flex-col">
                              <div class="flex align-items justify-center items-center">
                              @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                   @if($newsImage->articles_id == $NewsPageLatestNews->articles_id)
                                        <div class="ml-2 mr-2">
                                             <img class=" transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height:20vh; width: 15vw;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                        </div>
                                   @endif
                              @endforeach
                              </div>
                              <div class="" style="">
                                   <h5 class="text-center text-sm" style="width: 15vw;">{{$NewsPageLatestNews->article_title}}</h5>
                              </div>
                        </div>
                    </a>
                    </div>
               @endforeach
          </div>
     </div>
</div>

    <div class=" grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" data-aos="fade-right">
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
     
     @foreach($getDisplaySelectedOrganizationInterfaceBannerData as $organizationUI)
     
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
     @section('title', $organizationUI->organization_name)

<div class="lg:ml-20 lg:mr-20 md:ml-0 md:mr-0 sm:mr-0 sm:ml-0 ">
<div class="sliding-announcement-wrap">
    <div class="sliding-announcement">
@foreach($getDisplayArticlesOnOrganizationCarousel as $orgPage)
          <a href="{{$orgPage->article_slug}}">
              <div class="sliding-annonuncement-image-container">
                    @foreach($getDisplaySelectedNewsImageData as $newsImage)
                        @if($newsImage->articles_id == $orgPage->articles_id)
                            <img class="sliding-annonuncement-image" src="{{ asset('files/'.$newsImage->asset_name) }}">
                        @endif
                    @endforeach
                  <h5 class="text-center"></h5>
               <div style="position: absolute; top: 90%; bottom: 0%; background: rgba(33, 38, 38, .8); width: 100%;"><p style="color: rgba(255, 255, 255, 1.0);">{{$orgPage->article_title}}</p></div>
              </div>
          </a>
     @endforeach

    </div>

    <button class="button-slider slide-arrow prev-arrow"></button>
    <button class="button-slider slide-arrow next-arrow"></button>
</div>

<div style="background: linear-gradient(200deg, {{$organizationUI->organization_primary_color}} 0%, {{$organizationUI->organization_secondary_color}} 100%);" id="organization-details" class="grid lg:grid-cols-10 md:grid-cols-10 sm:grid-row-4 mt-5" onclick="onloadOrgFunctions()">
     <div style=""></div>
     <div class="lg:col-span-2 md:col-span-2 sm:col-span-8" style="">
          @foreach($getDisplaySelectedOrganizationAssetLogoData as $organizationLogo)
              <div class="flex flex-col flex-wrap justify-center align-items" style="">
                      <img class="" style="background:white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.50); max-width: 100%; height: auto" src="{{ asset('files/' . $organizationLogo->asset_name) }}">
               </div>
          @endforeach
     </div>
     <div class="lg:col-span-6 md:col-span-6 sm:col-span-8">
          @foreach($getDisplaySelectedOrganizationAssetLogoData as $organizationLogo)
              <div class="" style="">
                    <div class="org-logo-image flex flex-col flex-wrap justify-center items-center text-center" style="margin:0px auto auto auto;">
                        <p class="organization-title" style="color: white">{{$organizationUI->organization_name}}</p>
                    </div>
               </div>
          @endforeach
     </div>
     <div style=""></div>
</div>

<div id="organization-details" class="grid lg:grid-cols-10 md:grid-cols-10 sm:grid-row-4 mt-5 bg-gray-900" onclick="onloadOrgFunctions()">
     <div class="lg:col-span-3 md:col-span-3 sm:col-span-3" style="">
          <div class="flex">
               <div>Latest Announcements</div>
          </div>
          @foreach($getDsiplayFeaturedArticleOnCreatedPage as $featuredArticles)
                <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0">
                    <a href="{{$featuredArticles->article_slug}}">
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$featuredArticles->article_title}}</h5>
                        </div>
                    </a>
                </div>
          @endforeach
     </div>
     <div class="lg:col-span-7 md:col-span-7 sm:col-span-7">
          <div class="flex flex-row">
               <div>Latest News</div>
          </div>
          <div class="flex align-items justify-center" data-aos="fade-right">
               <div class="row" style="width:80%;">
                    <div class="column small-11 small-centered" style="background: #9CA3AF;">
                         <div class="slider slider-single" >
                                   @foreach($getDisplayArticleData as $orgNews)
                              <div class="grid grid-cols-2" style="background: #1F2937;">
                                       <div class="flex justify-center items-center bg-white-800" style="">
                                             @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                                 @if($newsImage->articles_id == $orgNews->articles_id)
                                                     <img class="organization-latest-news-slider" style="object-fit:fill; height: 30vh" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                                 @endif
                                             @endforeach
                                       </div>
                                       <div class="bg-white-800" style="color: white;">{{$orgNews->article_title}}</div>
                              </div>
                                   @endforeach
                         </div>
                         <div class="slider slider-nav" >
                                   @foreach($getDisplayArticleData as $orgNews)
                                       <div class="organization-latest-news-slider-container flex justify-center items-center flex-row mt-1 ml-4 mr-4">
                                             @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                                 @if($newsImage->articles_id == $orgNews->articles_id)
                                                     <img class="organization-latest-news-slider m-auto" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                                 @endif
                                             @endforeach
                                       </div>
                                   @endforeach
                         </div>
                    </div>
               </div>
          </div>

     </div>
</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>









@endforeach



@endif
<!--====  End of Organization WebPage Section comment  ====-->











<!-- FINAL DIV -->
</div>
