<div>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>



        <div id="navbar" style="padding:0px;" x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
          <div class="p-4 flex flex-row items-center justify-between">
               <a href="{{ url('/')}}" class="flex text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <img class="h-8" src="{{ asset('image/svg/pup.svg') }}">
                    <p  id="titulo1" class="system-title ml-2 text-white">Student Organization Information System</p>
                    <p  id="titulo2" class="system-title-2 ml-2 text-white">SOIS</p>
               </a>
               <button style="color:white" class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                         <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                         <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
               </button>
          </div>
          <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <a href="/" class="frontpage-nav-button" style="">
                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                     <i class="fas fa-home"></i>
                        <span class="ml-1">Home</span>
                    </button>
                    <span class="inline-flex rounded-md">
                    </span>
                </a>
                <a href="/news" class="frontpage-nav-button">
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
                <a href="{{ url('/login') }}" class="frontpage-nav-button">
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
