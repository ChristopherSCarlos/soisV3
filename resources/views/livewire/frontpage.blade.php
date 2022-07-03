

<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>     
     <!--====================================================
     =            Homepage Views Section comment            =
     =====================================================-->
     @if($isCurrentSlugInSystemPage->contains($urlslug) or $urlslug == $isFrontPageSlugNull)
     @section('title', 'Welcome to SOIS')
<!-- component -->

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>




<!-- front page navigation -->
     <div>
         
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
               <a href="/">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-home"></i>
                       <span class="ml-1">Home</span>
                   </button>
               </span>
               </a>
               <a href="/news">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="far fa-newspaper"></i>
                       <span class="ml-1">News</span>
                   </button>
               </span>
               </a>
                <div class="Panel frontpage-nav-button">
                    <span class="inline-flex rounded-md">
                  <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                      <i class="fas fa-users"></i>
                                <span class="ml-1">Organization</span>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                  </button>
                    </span>
                  <div id="myDropdown" class="dropdown-content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('PUP ORGANIZATIONS') }}
                    </div>
                    @foreach($orgLinks as $orgWebLinks)
                        <a href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">{{ $orgWebLinks->organization_name }}</a>
                    @endforeach
                  </div>
                </div>
               <a href="{{ url('/login') }}">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-sign-in-alt"></i>
                       <span class="ml-1">Login</span>
                   </button>
               </span>
               </a>
          </nav>
     </div>
</div>
         
     </div>


     <!-- main slider -->
     <div class="sliding-announcement-wrap-homepage" style=" height: 80vh;">
         <div class="sliding-announcement"  style="margin-bottom:0px; background: #1a1a1a;  height: 80vh;">
               @foreach($getDisplayArticlesOnHomepageCarousel as $HomepageNews)
               <a href="{{$HomepageNews->article_slug}}">
                   <div class="sliding-annonuncement-image-container" style=" height: 80vh;">
                         @foreach($getDisplaySelectedNewsImageData as $newsImage)
                             @if($newsImage->articles_id == $HomepageNews->articles_id)
                                 <img class="sliding-annonuncement-image" src="{{ asset('files/'.$newsImage->file) }}" style="object-fit: contain; height: 80vh;">
                             @endif
                         @endforeach
                   </div>
               </a>
          @endforeach
         </div>
         <div class="slick-slider-dots"></div>
         <button class="button-slider slide-arrow prev-arrow" style=""><i class="carousel-chevron fas fa-angle-left fa-2x"></i></button>
         <button class="button-slider slide-arrow next-arrow" style=""><i class="carousel-chevron fas fa-angle-right fa-2x"></i></button>
     </div>
<!-- End of front page navigation -->


<!-- front page carousel -->
<!-- end f=of frontpage carousel -->

<div class="grid grid-cols-12">
    <div class="text-center col-span-12 xs:col-span-6 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6" style="background: #1a1a1a;">
        <div class="text-white p-6 text-center">
            @foreach($displayARLink as $accomplishmentLink)
            <h4>{{$accomplishmentLink->link_name}}</h4>
            <p style="font-size:60%;">{{$accomplishmentLink->link_description}}</p>
            <a href="{{$accomplishmentLink->external_link}}">
                <x-jet-secondary-button>Visit Site</x-jet-secondary-button>
            </a>
            @endforeach
        </div>
    </div>
    <div class="col-span-12 xs:col-span-6 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6" style="background: #1a1a1a;">
        <div class="text-white p-6 text-center">
            @foreach($displayGPOALink as $gpoaLink)
            <h4>{{$gpoaLink->link_name}}</h4>
            <p style="font-size:60%;">{{$gpoaLink->link_description}}</p>
            <a href="{{$gpoaLink->external_link}}">
                <x-jet-secondary-button>Visit Site</x-jet-secondary-button>
            </a>
            @endforeach
        </div>
    </div>
    <div class="col-span-12 xs:col-span-6 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6" style="background: #1a1a1a;">
        <div class="text-white p-6 text-center">
            @foreach($displayMembershipLink as $membershipLink)
            <h4>{{$membershipLink->link_name}}</h4>
            <p style="font-size:60%;">{{$membershipLink->link_description}}</p>
            <a href="{{$membershipLink->external_link}}">
                <x-jet-secondary-button>Visit Site</x-jet-secondary-button>
            </a>
            @endforeach
        </div>
    </div>
    <div class="col-span-12 xs:col-span-6 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6" style="background: #1a1a1a;">
        <div class="text-white p-6 text-center">
            <h4>Financial Report</h4>
            <p style="font-size:60%;">"Description"</p>
            <a href="#">
                <x-jet-secondary-button>Visit Site</x-jet-secondary-button>
            </a>
        </div>
    </div>
</div> 

<!-- announcement -->
     <div class="flex flex-col" data-aos="fade-up">
          <div class="grid grid-cols-12">
               <div class="col-start-2 col-span-12 p-6">
                    <p class="homepage-titles " style="color:black">Latest Announcements</p>
               </div>
          </div>
          <div id="homepageNewsDiv">
            <div id="homepageLatestNewsDiv">
                <div class="grid grid-cols-2 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 lg:pl-9 md:pl-9 sm:pl-9 xl:pl-9 ">
                    @foreach($getDsiplayArticleLatestOnCreatedPage as $homepageLatestNews)
                        <div class="article-newspage p-3 flex flex-col">
                            <a href="{{$homepageLatestNews->article_slug}}">
                                <div class="items-center justify-center" style="width: 100%;">
                                    @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                        @if($newsImage->articles_id == $homepageLatestNews->articles_id)
                                            <img class="frontpage-image-announcement" style="object-fit:cover;" src="{{ asset('files/'.$newsImage->file) }}">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="home-page-latest-news-slick">
                                    <h5 class="text-black">{{$homepageLatestNews->article_title}}</h5>
                                    <p style="font-size: 10px;">{{\Carbon\Carbon::parse($homepageLatestNews->created_at)->isoFormat('MMM Do YYYY')}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
     </div>
</div>

<!-- latest news -->
<div class="flex flex-col" data-aos="fade-up">
    <div style="background: #1a1a1a;">
        <div class="grid grid-cols-12">
            <div class="col-start-2 col-span-9">
                <p class="homepage-titles pt-5" style="color: white;"><strong>News</strong></p> 
            </div>
        </div>
        <div id="homepageNewsDiv" onload="homepageNewsFunction()">
            <div id="homepageLatestNewsDiv">
                <div class="grid grid-cols-2 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 lg:pl-9 md:pl-9 sm:pl-9 xl:pl-9 ">
                    @foreach($getDsiplayArticleLatestOnCreatedPage as $homepageLatestNews)
                        <div class="article-newspage p-3 flex flex-col">
                            <a href="{{$homepageLatestNews->article_slug}}">
                                <div class="items-center justify-center" style="width: 100%;">
                                    @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                        @if($newsImage->articles_id == $homepageLatestNews->articles_id)
                                            <img class="frontpage-image-announcement" style="object-fit:cover;" src="{{ asset('files/'.$newsImage->file) }}">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="home-page-latest-news-slick">
                                    <h5 class="text-white">{{$homepageLatestNews->article_title}}</h5>
                                    <p style="font-size: 10px;">{{\Carbon\Carbon::parse($homepageLatestNews->created_at)->isoFormat('MMM Do YYYY')}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="homepageFeaturedNewsDiv">
                <div class="grid grid-cols-2 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 lg:pl-9 md:pl-9 sm:pl-9 xl:pl-9 ">
                    @foreach($getDsiplayFeaturedArticleOnCreatedPage as $featuredNewspage)
                        <div class="article-newspage p-3 flex flex-col">
                            <a href="{{$featuredNewspage->article_slug}}">
                                <div class="" style="width: 100%;">
                                    @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                        @if($newsImage->articles_id == $featuredNewspage->articles_id)
                                            <img style="object-fit:cover;  height:50vh;" src="{{ asset('files/'.$newsImage->file) }}">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="">
                                       <h5 class="">{{$featuredNewspage->article_title}}</h5>
                                       <p style="font-size: 10px;">{{\Carbon\Carbon::parse($featuredNewspage->created_at)->isoFormat('MMM Do YYYY')}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    /div>
    </div>




<div data-aos="fade-up" style="background: #ffffff;">
     <div class="grid grid-rows-2 " >
          <div class="text-center"><p class="homepage-titles"><strong>Featured Events</strong></p></div>
     </div>
     <div class=" p-6 flex justify-center items-center" style="width: 100%;">
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
                                                  <img class=" transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height:20vh; width: 15vw;" src="{{ asset('files/'.$newsImage->file) }}">
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
</div>

<div style="border-style: none;">
     
@livewire('footers')
</div>
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
               <a href="/">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-home"></i>
                       <span class="ml-1">Home</span>
                   </button>
               </span>
               </a>
               <a href="/news">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="far fa-newspaper"></i>
                       <span class="ml-1">News</span>
                   </button>
               </span>
               </a>
                <div class="Panel frontpage-nav-button">
                    <span class="inline-flex rounded-md">
                  <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                      <i class="fas fa-users"></i>
                                <span class="ml-1">Organization</span>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                  </button>
                    </span>
                  <div id="myDropdown" class="dropdown-content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('PUP ORGANIZATIONS') }}
                    </div>
                    @foreach($orgLinks as $orgWebLinks)
                        <a href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">{{ $orgWebLinks->organization_name }}</a>
                    @endforeach
                  </div>
                </div>

               <a href="{{ url('/login') }}">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-sign-in-alt"></i>
                       <span class="ml-1">Login</span>
                   </button>
               </span>
               </a>
          </nav>
     </div>
</div>


@foreach($getTopNewsArticleOnCreatedPage as $topNews)
<div class="newspage-container grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1" style="background: #1a1b1b; color: white; border-style: none;">
         <div class="newspage-featured-top flex flex-wrap justify-center align-items p-6" style="margin:auto;">
    <a href="{{$topNews->article_slug}}">
              <p class="news-title-text">{{$topNews->article_title}}</p>
    </a>
          </div>
          <div class="newspage-featured-top flex flex-wrap justify-center align-items p-3" style="margin:auto;">
                    @foreach($getDisplaySelectedNewsImageData as $newsImage)
                         @if($newsImage->articles_id == $topNews->articles_id)
                              <img style="object-fit:cover; height:80%;" src="{{ asset('files/'.$newsImage->file) }}">
                         @endif
                    @endforeach
          </div>
</div>
@endforeach

<div class="grid grid-cols-12">
     <div class="col-span-12 xl:col-span-8 lg:col-span-8 md:col-span-8 sm:col-span-12 ">
          <div class="flex flex-col">
               <div class="pl-3">
                    <h2 class="newspage-titles">Latest News</h2>
               </div>
               <div class="grid grid-cols-2 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 lg:pl-9 md:pl-9 sm:pl-9 xl:pl-9 ">
               @foreach($getDiplayLatestSixArticleOnNewsPage as $latestSixNews)
                    <div class="article-newspage p-3 flex flex-col">
                        <a href="{{$latestSixNews->article_slug}}">
                            <div class="" style="width: 100%;">
                                @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                    @if($newsImage->articles_id == $latestSixNews->articles_id)
                                        <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->file) }}">
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
     </div>
     <div class="col-span-12 xl:col-span-4 lg:col-span-4 md:col-span-4 sm:col-span-12" style="background:rgba(26,27,27,255); border-style:none;">
          <div class="flex flex-col">
               <div class="pl-3">
                    <h2 class="newspage-titles" style="color:white;">Latest Annoucements</h2>
               </div>
               <div class="grid grid-cols-1">
                    @foreach($getDiplayLatestAnnouncementsOnNewsPage as $AnnouncementsNewsPage)
                    <div class="announcement-hover announcement-data lg:pl-9 md:pl-9 sm:pl-9 xl:pl-9">
                    <a  href="{{$AnnouncementsNewsPage->announcement_slug}}">
                         <div class=" ">
                              <p>{{$AnnouncementsNewsPage->announcement_title}}</p>
                              <p style="font-size: 10px;">{{\Carbon\Carbon::parse($AnnouncementsNewsPage->created_at)->isoFormat('MMM Do YYYY')}}</p>
                         </div>
                    </a>
                    </div>
                    @endforeach
               </div>
          </div>
     </div>
</div>

<div class=" p-6 flex justify-center items-center" style="background: #0d0c0d;width: 100%; color:white;">
     <div class=" mb-6"  style="width:95% ;">
          <div class="newspage-titles mt-5 mb-5" style="border-style: none;">
               <p class="text-center">LATEST Events</p>
          </div>
          <div class="newspage-events-slick">
               @foreach($getDiplayEventsOnNewsPage as $ArticleEvents)
                    <a href="{{$ArticleEvents->article_slug}}">
                        <div class="lg:mr-9 lg:ml-9 md:ml-5 md:mr-5 sm:ml-5 sm:mr-5 mr-5 ml-5 w-60 flex flex-col">
                              <div class="flex align-items justify-center items-center">
                                   @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                        @if($newsImage->articles_id == $ArticleEvents->articles_id)
                                             <div class="flex align-items justify-center items-center">
                                                  <img class="newspage-latest-events transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="" src="{{ asset('files/'.$newsImage->file) }}">
                                             </div>
                                        @endif
                                   @endforeach
                              </div>
                              <div class="newspage-latest-events-title " style="width: 100%;">
                                   <h5 class="text-center text-sm">{{$ArticleEvents->article_title}}</h5>
                              </div>
                        </div>
                    </a>
               @endforeach
          </div>
     </div>
</div>

<!--=================================================
=            Latest News Section comment            =
==================================================-->
<div class="">
     
</div>

<div class="flex flex-col">
     <div class="newspage-titles mt-5 mb-5" style="border-style: none;">
          <p class="text-center">Featured News</p>
     </div>
     <div class="grid grid-cols-2 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 lg:pl-9 md:pl-9 sm:pl-9 xl:pl-9 ">
          @foreach($getDsiplayFeaturedArticleOnCreatedPage as $featuredNewspage)
               <div class="article-newspage p-3 flex flex-col">
                   <a href="{{$featuredNewspage->article_slug}}">
                       <div class="" style="width: 100%;">
                           @foreach($getDisplaySelectedNewsImageData as $newsImage)
                               @if($newsImage->articles_id == $featuredNewspage->articles_id)
                                   <img style="object-fit:cover" src="{{ asset('files/'.$newsImage->file) }}">
                               @endif
                           @endforeach
                       </div>
                       <div class="">
                              <h5 class="">{{$featuredNewspage->article_title}}</h5>
                              <p style="font-size: 10px;">{{\Carbon\Carbon::parse($featuredNewspage->created_at)->isoFormat('MMM Do YYYY')}}</p>
                       </div>
                   </a>
               </div>
          @endforeach
     </div>

</div>

<div style="">

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
                                             <img class=" transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height:20vh; width: 15vw;" src="{{ asset('files/'.$newsImage->file) }}">
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
               <a href="/">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-home"></i>
                       <span class="ml-1">Home</span>
                   </button>
               </span>
               </a>
               <a href="/news">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="far fa-newspaper"></i>
                       <span class="ml-1">News</span>
                   </button>
               </span>
               </a>
                <div class="Panel frontpage-nav-button">
                    <span class="inline-flex rounded-md">
                  <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                      <i class="fas fa-users"></i>
                                <span class="ml-1">Organization</span>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                  </button>
                    </span>
                  <div id="myDropdown" class="dropdown-content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('PUP ORGANIZATIONS') }}
                    </div>
                    @foreach($orgLinks as $orgWebLinks)
                        <a href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">{{ $orgWebLinks->organization_name }}</a>
                    @endforeach
                  </div>
                </div>

               <a href="{{ url('/login') }}">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-sign-in-alt"></i>
                       <span class="ml-1">Login</span>
                   </button>
               </span>
               </a>
          </nav>
     </div>
</div>


@foreach($getDisplaySelectedNewsArticleData as $articleSelectedData)
@section('title', $articleSelectedData->article_title)

     @if($articleSelectedData->article_slug == $urlslug)


               <div class="flex flex-col flex-wrap items-center justify-center mb-5" style="background: #1a1b1b; ">
                    <div style="">
                         <div class="flex flex-col flex-wrap items-center justify-center" style="">
                         @foreach($getDisplaySelectedNewsImageDataOnSelectedNews as $data)
                              <img style="height: 60vh;object-fit: contain;" src="{{asset('files/'.$data->file)}}">
                         @endforeach
                         </div>
                    </div>
               </div>



<div class="selected-news-data-announcement-wrapper">
    <div class="pt-6 pr-6 pb-6 pl-36 flex flex-col flex-wrap items-center justify-center text-center">
         <p class="">{{$articleSelectedData->article_title}}</p>
    </div>
  <div class="selected-news-announcement pt-6 pr-6 pb-6 pl-36">
       <p class=""><?php echo htmlspecialchars_decode(stripslashes($articleSelectedData->article_content));  ?></p>
  </div>
  <div class=" selected-news-data-content-scroll pt-6 pl-6 pb-6">
       <div class="flex flex-row">
               <div><p class="homepage-titles text-white"><strong>Latest Announcements</strong></p></div>

          </div>
          <div class="h-5/6 overflow-y-scroll scroller" style="">
          @foreach($getDisplayAnnouncementFeaturedHomepage as $HomepageAnnouncement)
               <div class="annonuncement-links-homepage mt-5 hover:bg-gray-200">
                    <a class="bg-gray-200 text-white hover:bg-gray-200 hover:text-black" href="{{$HomepageAnnouncement->announcement_title}}">
                         <h2 class="text-left text-4x1 font-medium">{{$HomepageAnnouncement->announcement_title}}</h2>
                         <h5 class="text-left text-xs font-light">{{\Carbon\Carbon::parse($HomepageAnnouncement->created_at)->isoFormat('MMM Do YYYY')}}</h5>
                    </a>
               </div>
          @endforeach
          </div>
  </div>
</div>




















     @endif
@endforeach


<hr>
<div class=" p-6 flex justify-center items-center" style="background: #0d0c0d;width: 100%; color:white;">
     <div class=" mb-6"  style="width:95% ;">
          <div class="newspage-titles mt-5 mb-5" style="border-style: none;">
               <p class="text-center">LATEST Events</p>
          </div>
          <div class="newspage-events-slick">
               @foreach($getDiplayEventsOnNewsPage as $ArticleEvents)
                    <a href="{{$ArticleEvents->article_slug}}">
                        <div class="lg:mr-9 lg:ml-9 md:ml-5 md:mr-5 sm:ml-5 sm:mr-5 mr-5 ml-5 w-60 flex flex-col">
                              <div class="flex align-items justify-center items-center">
                                   @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                        @if($newsImage->articles_id == $ArticleEvents->articles_id)
                                             <div class="flex align-items justify-center items-center">
                                                  <img class="newspage-latest-events transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="" src="{{ asset('files/'.$newsImage->file) }}">
                                             </div>
                                        @endif
                                   @endforeach
                              </div>
                              <div class="newspage-latest-events-title " style="width: 100%;">
                                   <h5 class="text-center text-sm">{{$ArticleEvents->article_title}}</h5>
                              </div>
                        </div>
                    </a>
               @endforeach
          </div>
     </div>
</div>





@livewire('footers')







@endif
<!--====  End of Selected News Article Section comment  ====-->


<!--==========================================================
=            Selected Organization WebPage Section comment            =
===========================================================-->
@if($getDisplaySelectedOrganization->contains($urlslug))
     
     @foreach($getDisplaySelectedOrganizationInterfaceBannerData as $organizationUI)
     <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=210115755725416&autoLogAppEvents=1" nonce="D0oZHgy9"></script>
     
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
               <a href="/">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-home"></i>
                       <span class="ml-1">Home</span>
                   </button>
               </span>
               </a>
               <a href="/news">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="far fa-newspaper"></i>
                       <span class="ml-1">News</span>
                   </button>
               </span>
               </a>
                <div class="Panel frontpage-nav-button">
                    <span class="inline-flex rounded-md">
                  <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                      <i class="fas fa-users"></i>
                                <span class="ml-1">Organization</span>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                  </button>
                    </span>
                  <div id="myDropdown" class="dropdown-content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('PUP ORGANIZATIONS') }}
                    </div>
                    @foreach($orgLinks as $orgWebLinks)
                        <a href="{{ url($orgWebLinks->organization_slug) }}" class="frontpage-nav-bar-design">{{ $orgWebLinks->organization_name }}</a>
                    @endforeach
                  </div>
                </div>

               <a href="{{ url('/login') }}">
               <span class="inline-flex rounded-md">
                   <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-sign-in-alt"></i>
                       <span class="ml-1">Login</span>
                   </button>
               </span>
               </a>
          </nav>
     </div>
</div>
     @section('title', $organizationUI->organization_name)


<div class="sliding-announcement-wrap-homepage">
    <div class="sliding-announcement">

          @foreach($getDisplayArticlesOnOrganizationCarousel as $orgPage)
          <a href="{{$orgPage->article_slug}}">
              <div class="sliding-annonuncement-image-container">
                    @foreach($getDisplaySelectedNewsImageData as $newsImage)
                        @if($newsImage->articles_id == $orgPage->articles_id)
                            <img class="sliding-annonuncement-image" src="{{ asset('files/'.$newsImage->file) }}">
                        @endif
                    @endforeach
                  <h5 class="text-center"></h5>
               <div style="position: absolute; top: 90%; bottom: 0%; background: rgba(33, 38, 38, .8); width: 100%;"><p style="color: rgba(255, 255, 255, 1.0);">{{$orgPage->article_title}}</p></div>
              </div>
          </a>
     @endforeach

    </div>

    <button class="button-slider slide-arrow prev-arrow"><i class="carousel-chevron fas fa-angle-left fa-2x"></i></button>
    <button class="button-slider slide-arrow next-arrow"><i class="carousel-chevron fas fa-angle-right fa-2x"></i></button>
</div>








<div class="lg:ml-20 lg:mr-20 md:ml-0 md:mr-0 sm:mr-0 sm:ml-0 ">

<div style="background: linear-gradient(200deg, {{$organizationUI->organization_primary_color}} 0%, {{$organizationUI->organization_secondary_color}} 100%);" id="organization-details" class="grid lg:grid-cols-10 md:grid-cols-10 sm:grid-row-4 mt-5" onclick="onloadOrgFunctions()">
     <div style=""></div>
     <div class="lg:col-span-2 md:col-span-2 sm:col-span-8" style="">
          @foreach($getDisplaySelectedOrganizationAssetLogoData as $organizationLogo)
              <div class="flex flex-col flex-wrap justify-center align-items" style="">
                      <img class="" style="background:white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.50); max-width: 100%; height: auto" src="{{ asset('files/' . $organizationLogo->file) }}">
               </div>
          @endforeach
     </div>
     <div class="lg:col-span-6 md:col-span-6 sm:col-span-8">
          @foreach($getDisplaySelectedOrganizationAssetLogoData as $organizationLogo)
              <div class="" style="">
                    <div class="org-logo-image flex flex-col flex-wrap justify-center items-center text-center" style="margin:0px auto auto auto;">
                        <p class="organization-title" style="color: white">{{$organizationUI->organization_name}}</p>
                    </div>
                    <div>
                         <p class="pl-5 text-white">{{$organizationUI->organization_details}}</p>
                    </div>
               </div>
          @endforeach
     </div>
     <div style=""></div>
</div>

<div class="grid grid-cols-12 lg:grid-rows-1 md:grid-rows-1 sm:grid-rows-2 bg-gray-200">
     <div class="xl:col-span-4 lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-12 mt-4">
          <div class="flex flex-row">
               <div><p class="homepage-titles"><strong>Latest Announcements</strong></p></div>

          </div>
          <div class=" h-5/6" style="overflow:auto;">
          @foreach($getDisplayAnnouncementData as $HomepageAnnouncement)
               <div class="annonuncement-links-homepage mt-5 bg-gray-200 hover:bg-gray-600">
                    <a class="bg-gray-200 hover:bg-gray-600 hover:text-white" href="{{$HomepageAnnouncement->announcement_title}}">
                         <h2 class="text-left text-4x1 font-medium">{{$HomepageAnnouncement->announcement_title}}</h2>
                         <h5 class="text-left text-xs font-light">{{\Carbon\Carbon::parse($HomepageAnnouncement->created_at)->isoFormat('MMM Do YYYY')}}</h5>
                    </a>
               </div>
          @endforeach
          </div>
     </div>
     <div class="xl:col-span-8 lg:col-span-8 md:col-span-8 sm:col-span-8 col-span-12 mt-4">
          <div class="flex flex-row">
               <div><p class="homepage-titles"><strong>Latest News</strong></p></div>
          </div>
          <div class="latest-news-slider-holder bg-gray-900 pl-9 pr-9 w-full">
               <div class="slider slider-for">
                  @foreach($getDisplayArticleData as $orgNews)
                 <div>
                      <a href="{{$orgNews->article_slug}}">
                                       <div class="flex justify-center items-center bg-white-800" style="">
                                             @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                                 @if($newsImage->articles_id == $orgNews->articles_id)
                                                     <img class="organization-latest-news-slider" style="object-fit:fill; height: 20vw" src="{{ asset('files/'.$newsImage->file) }}">
                                                 @endif
                                             @endforeach
                                       </div>
                                       <div class="bg-white-800" style="color: white;">{{$orgNews->article_title}}</div>
                                   </a>
                 </div>
                  @endforeach
               </div>
               <div class="slider slider-nav">
                 @foreach($getDisplayArticleData as $orgNews)
                                       <div class="organization-latest-news-slider-container flex justify-center items-center flex-row mt-1 p-2">
                                             @foreach($getDisplaySelectedNewsImageData as $newsImage)
                                                 @if($newsImage->articles_id == $orgNews->articles_id)
                                                     <div class="ml-2 mr-2">
                                                          <img class="organization-latest-news-slider transition hover:opacity-25 transition-opacity duration-1000 ease-out h-2/6" style="object-fit:fill;" src="{{ asset('files/'.$newsImage->file) }}">
                                                     </div>
                                                 @endif
                                             @endforeach
                                       </div>
                                   @endforeach
               </div>
          </div>
     </div>
</div>



</div>
<div class="flex flex-col bg-gray-800">
     <div class="flex items-center justify-center">
          <h2>Events</h2>
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
                                             <img class=" transition hover:opacity-25 transition-opacity duration-1000 ease-out" style="object-fit:fill; height:20vh; width: 15vw;" src="{{ asset('files/'.$newsImage->file) }}">
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
</div>




<div class="grid lg:{{$embedGrid}} md:grid-cols-2 sm:grid-cols-1">
     
     @foreach($getDisplaySelectedOrganizationEmbedSocialData as $orgEmbedSocial)
               <div class=""><?php echo htmlspecialchars_decode(stripslashes($orgEmbedSocial->embed_data));  ?></div>
     @endforeach
</div>
</div>
@livewire('footers')







@endforeach



@endif
<!--====  End of Organization WebPage Section comment  ====-->











<!-- FINAL DIV -->
</div>
