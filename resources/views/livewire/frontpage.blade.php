<div class="divide-y divide-gray-800 " x-data="{ show: false }">
     <!--====================================================
     =            Homepage Views Section comment            =
     =====================================================-->
     @if($isCurrentSlugInSystemPage->contains($urlslug) or $urlslug == $isFrontPageSlugNull)
          @foreach($isWebpageHomepage as $homepageData)
               <!--======================================================================
               =            Homepage Landing Page Navigation Section comment            =
               =======================================================================-->
               <div class="bg-img" style="background-image: linear-gradient(to bottom, transparent, #0a0000), url('/image/sample-bg.jpg');">
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
               
               
               <!--====  End of Homepage Landing Page Navigation Section comment  ====-->
               
                    <!--================================================================
                    =            Homepage Landing Page Title Section comment            =
                    =================================================================-->
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
                    <div class="" style="background: #0a0000; height: 100vh;">{{$homepageData->content}}</div>
                    @endif
                    <div class="" style="background: red; height: 100vh;">There is no content</div>
                    <!--====  End of Homepage Landing Page Content Section comment  ====-->
               </div>
          @endforeach
     @endif
</div>
          
     <!--====  End of Homepage Views Section comment  ====-->
     
     <!--====================================================
     =            News Frontpage Section comment            =
     ========================================================-->
     @if($urlslug == 'news')   
          <!--=====================================================
          =            News Navigation Section comment            =
          ======================================================-->
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
                              <a href="{{ url('newspage') }}" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
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
          <!--====  End of News Navigation Section comment  ====-->
          

          <!--==================================================================
          =            News Frontpage Featured News Section comment            =
          ===================================================================-->
          @foreach($getTopNewsArticleOnCreatedPage as $topNews)
               <div class="newspage-container grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1" style="background: #1a1b1b; color: white; height:100vh;">
                   <div class="newspage-featured-top">
                       <p class="text">{{$topNews->article_title}}</p>
                   </div>
                   <div class="newspage-featured-top">
                       <div>
                           <img src="https://assets.website-files.com/5ff4e43997c4ec6aa5d646d1/603d547ed5c5fd6365dabbef_industry%20expert%20roundup%20-%20why%20are%20events%20important-p-800.png">
                       </div>
                   </div>
               </div>
          @endforeach
          <!--====  End of News Frontpage Featured News Section comment  ====-->
          
          <!--===============================================================
          =            News Frontpage Lates News Section comment            =
          ================================================================-->
<!-- LATEST NEWS -->
<div style="">
    <div class="frontpage-newspage-title mt-5 mb-5" style="border-style: none;">
        <p class="text-center">LATEST NEWS</p>
    </div>
    
    <div class="latest-news-container ml-5 mr-5" style="border-style: none;">
        <!-- component -->
        <div class="news-container grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1" >
            <div class="latest-latest-news-container-first">
                <a href="{{$getDsiplayArticleLatestOnCreatedPage->article_slug}}">
                    <div class="latest-latest-news-image-first">
                        <img style="object-fit:cover" src="https://thumbor.forbes.com/thumbor/fit-in/1200x0/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5e020def4e2917000783d582%2F0x0.jpg">
                    </div>
                    <div class="latest-latest-news-text-first">
                        <h2 class="text-center">{{$getDsiplayArticleLatestOnCreatedPage->article_title}}</h2>
                    </div>
                </a>
            </div>
            <div class="latest-latest-news-container-nine grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2" >
                @foreach($getDsiplayArticleDataOnCreatedPage as $latestNews)
                <div class="latest-latest-news-card-container-nine lg:m-5 md:m-5 sm:m-0">
                    <a href="{{$latestNews->article_slug}}">
                        <div class="latest-latest-news-image-nine">
                            <img style="object-fit:cover" src="https://thumbor.forbes.com/thumbor/fit-in/1200x0/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5e020def4e2917000783d582%2F0x0.jpg">
                        </div>
                        <div class="latest-latest-news-text-nine">
                            <h5 class="text-center">{{$latestNews->article_title}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- LATEST NEWS -->
          
          
          <!--====  End of News Frontpage Lates News Section comment  ====-->
          





     @endif

     <!--====  End of Organization Frontpage Section comment  ====-->















<!-- FINAL DIV -->
</div>
