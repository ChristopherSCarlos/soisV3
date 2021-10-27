<div class="divide-y divide-gray-800 " x-data="{ show: false }">
     <!--====================================================
     =            Homepage Views Section comment            =
     =====================================================-->
     @if($isCurrentSlugInSystemPage->contains($urlslug) or $urlslug == $isFrontPageSlugNull)
     
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

          <!--================================================================
          =            Homepage Landing Page Title Section comment            =
          =================================================================-->
          <div class="frontpage-title-container">
               <div class="frontpage-title-logo-container">
                    <img class="frontpage-title-image opacity-70 hover:opacity-100 transition duration-500 ease-in-out" src="{{ asset('image/svg/pup.svg') }}">
               </div>
               <div class="frontpage-title-title-container">
                    <p class="frontpage-title-title">{{ $title }}</p>
               </div>
          </div>
          <!--====  End of Homepage Landing Page Title Section comment  ====-->


          <!--===================================================================
          =            Homepage Landing Page Content Section comment            =
          ====================================================================-->
          @if($content)
          <div class="" style="background: lemonchiffon; height: 100vh;"></div>
          @else
          <div class="" style="background: red; height: 100vh;"></div>
          @endif
          
          <!--====  End of Homepage Landing Page Content Section comment  ====-->
          
          
    </div>
</div>

     @endif
     
     
     
     <!--====  End of Homepage Views Section comment  ====-->
     
















<!-- FINAL DIV -->
</div>
