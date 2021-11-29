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
               <div class="" style="width: 100vw;">
                    <a href="{{$HomepageAnnouncement->announcement_slug}}">
                         <div class="flex flex-row justify-center items-center" style="">
                              <h5 class="text-center" style=" ">{{$HomepageAnnouncement->announcement_title}}</h5>
                              <img class="h-5 ml-5 mr-5" src="{{ asset('image/svg/pup.svg') }}">
                         </div>
                    </a>
               </div>
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
                                   <a href="{{$orgNews->article_slug}}">
                                       <div class="flex justify-center items-center bg-white-800" style="">
                                             @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                                 @if($newsImage->articles_id == $orgNews->articles_id)
                                                     <img class="organization-latest-news-slider" style="object-fit:fill; height: 50vh;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                                 @endif
                                             @endforeach
                                       </div>
                                       <div class="bg-white-800" style="color: white;">{{$orgNews->article_title}}</div>
                                   </a>
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

<div class="mt-3  mb-3" style="">
     <div class="text-center"><p class="homepage-titles">Quick Links</p></div>
     <div class="grid grid-cols-4">
          <div>GPOA</div>
          <div>MEMBERSHIP</div>
          <div>Accomplishment Report</div>
          <div>Financial Statement</div>
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
@section('title', 'News and Announcements')
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
               <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Home</a>
               <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/news">News</a>
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

<div class="grid grid-cols-12">
     <div class=""></div>
     <div class=" col-span-8 flex flex-col">
          <div class="newspage-title">Latest News</div>
          <div class="grid grid-cols-4">
                    @foreach($getDiplayLatestSixArticleOnNewsPage as $latestSixNews)
               <div class="p-3 flex flex-col">
                        <a href="{{$latestSixNews->article_slug}}">
                            <div class="" style="width: 100%;">
                                @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                    @if($newsImage->articles_id == $latestSixNews->articles_id)
                                        <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="">
                                   <h5 class="">{{$latestSixNews->article_title}}</h5>
                                   <p style="font-size: 10px;">{{\Carbon\Carbon::parse($latestSixNews->created_at)->isoFormat('MMM Do YYYY')}}</p>
                            </div>
                        </a>
               </div>
                    @endforeach
          </div>
     </div>
     <div class="col-span-2 flex flex-col">
          <div class="newspage-title">Announcemetns</div>
               <div class="grid grid-rows-1">
          @foreach($getDiplayLatestAnnouncementsOnNewsPage as $AnnouncementsNewsPage)
                    <a href="{{$AnnouncementsNewsPage->announcement_slug}}">
                    <div class="mt-2 mb-2">
                         <p>{{$AnnouncementsNewsPage->announcement_title}}</p>
                         <p style="font-size: 10px;">{{\Carbon\Carbon::parse($AnnouncementsNewsPage->created_at)->isoFormat('MMM Do YYYY')}}</p>
                    </div>
                    </a>
          @endforeach
               </div>
     </div>
     <div class=""></div>
</div>

<div class=" p-6 flex justify-center items-center" style="background: #0d0c0d;width: 100%; color:white;">
     <div class=" mb-6"  style="width:95% ;">
          <div class="homepage-events-slick">
               @foreach($getDsiplayArticleDataOnCreatedPage as $MoreArticleNews)
                    <div>
                    <a href="{{$MoreArticleNews->article_slug}}">
                        <div class="mr-5 ml-5 pl-5 pr-5 flex flex-col">
                              <div class="flex align-items justify-center items-center">
                              @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                   @if($newsImage->articles_id == $MoreArticleNews->articles_id)
                                        <div class="ml-2 mr-2">
                                             <img class=" transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height:20vh; width: 15vw;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                        </div>
                                   @endif
                              @endforeach
                              </div>
                              <div class="" style="">
                                   <h5 class="text-center text-sm" style="width: 15vw;">{{$MoreArticleNews->article_title}}</h5>
                              </div>
                        </div>
                    </a>
                    </div>
               @endforeach
          </div>
     </div>
</div>

<!--=================================================
=            Latest News Section comment            =
==================================================-->
<div style="">
<div class="frontpage-newspage-title mt-5 mb-5" style="border-style: none;">
        <p class="text-center">LATEST Events</p>
    </div>
    <div class="grid grid-cols-3">
          @foreach($getDiplayEventsOnNewsPage as $ArticleEvents)
          <div class="latest-latest-news-container-nine lg:m-5 md:m-5 sm:m-0" data-aos="flip-up">
              <a href="{{$ArticleEvents->article_slug}}">
                  <div class="latest-latest-news-image-nine">
                      @foreach($getDisplaySelectedNewsImageData as $newsImage)
                          @if($newsImage->articles_id == $ArticleEvents->articles_id)
                              <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->asset_name) }}">
                          @endif
                      @endforeach
                  </div>
                  <div class="latest-latest-news-text-nine">
                      <h5 class="text-center">{{$ArticleEvents->article_title}}</h5>
                  </div>
              </a>
          </div>
          @endforeach
    </div>
<div class=" p-6 flex justify-center items-center" style="background: #171517;width: 100%; color:white;" data-aos="fade-right">
     <div class=" mb-6"  style="width:95% ;">
          <div class="homepage-events-slick">
               @foreach($getDiplayEventsAllOnNewsPage as $NewsPageAllEvents)
                    <div>
                    <a href="{{$NewsPageAllEvents->article_slug}}">
                        <div class="mr-5 ml-5 pl-5 pr-5 flex flex-col">
                              <div class="flex align-items justify-center items-center">
                              @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                   @if($newsImage->articles_id == $NewsPageAllEvents->articles_id)
                                        <div class="ml-2 mr-2">
                                             <img class=" transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height:20vh; width: 15vw;" src="{{ asset('files/'.$newsImage->asset_name) }}">
                                        </div>
                                   @endif
                              @endforeach
                              </div>
                              <div class="" style="">
                                   <h5 class="text-center text-sm" style="width: 15vw;">{{$NewsPageAllEvents->article_title}}</h5>
                              </div>
                        </div>
                    </a>
                    </div>
               @endforeach
          </div>
     </div>
</div>



<!--====  End of Featured News Section comment  ====-->



@livewire('footers')

@endif
<!--====  End of Newspage Homepage Section comment  ====-->




<!--============================================================
=            Selected Announcements Section comment            =
=============================================================-->
@if($urlslug != null)
@if($getDisplaySelectedAnnouncements->contains($urlslug))

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
               <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Home</a>
               <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/news">News</a>
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


@foreach($getDisplaySelectedAnnouncementsData as $selectedAnnouncements)
@section('title', $selectedAnnouncements->announcement_title)
<div class="grid grid-cols-12">
     <div></div>
     <div class="col-span-10">
          <div class="flex flex-col">{{$selectedAnnouncements->announcement_title}}</div>
          <div><p><?php echo htmlspecialchars_decode(stripslashes($selectedAnnouncements->announcement_content));  ?></p></div>
     </div>
     <div></div>
</div>





@endforeach

@endif
@endif

<!--====  End of Selected Announcements Section comment  ====-->





<!--===========================================================
=            Selected News Article Section comment            =
============================================================-->
@if($getDisplaySelectedNewsArticle->contains($urlslug))
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
               <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Home</a>
               <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/news">News</a>
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


@foreach($getDisplaySelectedNewsArticleData as $articleSelectedData)
@section('title', $articleSelectedData->article_title)

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
     <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=210115755725416&autoLogAppEvents=1" nonce="D0oZHgy9"></script>
     
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
<div class="grid grid-cols-2">
     <div class="fb-page" data-href="https://www.facebook.com/PUPTCS/" data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Meta</a></blockquote></div>
     <div>
          <a class="twitter-timeline" data-width="500" data-height="500" data-theme="dark" href="https://twitter.com/puptcs?ref_src=twsrc%5Etfw">Tweets by puptcs</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          
     </div>
</div>
<iframe width="320" height="440" src="https://www.instagram.com/puptcs" frameborder="0"></iframe>
@livewire('footers')







@endforeach



@endif
<!--====  End of Organization WebPage Section comment  ====-->











<!-- FINAL DIV -->
</div>
