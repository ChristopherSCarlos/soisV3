<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>


<style>
     li > .ul-id {
        transform: translatex(100%) scale(0);
      }
      li:hover > .ul-id {
        transform: translatex(101%) scale(1);
      }
      li > button svg {
        transform: rotate(-90deg);
      }
      li:hover > button svg {
        transform: rotate(-270deg);
      }
</style>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100  bg-red-900" style="background: maroon !important;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('default-interfaces') }}">
                        <!-- <x-jet-application-mark class="block h-9 w-auto" /> -->
                        <img class="block h-9 w-auto" src="{{ asset('image/svg/pup.svg') }}">
                    </a>
                </div>


                <!-- Navigation Links -->
                <!-- SUPER ADMIN HOMEAPGE NAVIGATION -->
                @if($getUserRole == "Super Admin")
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Homepage</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('default-interfaces') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Dashboard</li>
                            </a>
                            <a href="{{ route('organizations') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Organizations</li>
                            </a>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">News and Announcement</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('articles') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">News</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Announcemets</li>
                                    </a>
                                </ul>
                            </li>
                            <a href="{{ route('roles') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Roles</li>
                            </a>
                            <a href="{{ route('sub-links') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Gate SubLinks</li>
                            </a>
                            <a href="{{ route('officers') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Officers</li>
                            </a>
                            <a href="{{ route('users') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Users</li>
                            </a>
                        </ul>
                    </div>
                </div>
                @endif
                @if($getUserRole == "Super Admin")
                <!-- SUPER ADMIN MEMBERSHIP NAVIGATION -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Membership Report</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">Organizations</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('articles') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Dashboard</li>
                                    </a>
                                    <a href="{{ route('memberships')}} ">
                                        <li class="px-3 py-1 hover:bg-gray-100">Memberships</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">User Management</li>
                                    </a>
                                </ul>
                            </li>
                            <a href="{{ route('roles') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Members</li>
                            </a>
                            <a href="{{ route('sub-links') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Payment Details</li>
                            </a>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">Application</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('articles') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Application Requests</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Account Registrants</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Declined Applications</li>
                                    </a>
                                </ul>
                            </li>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">Messages</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('articles') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Inbox</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Sent</li>
                                    </a>
                                </ul>
                            </li>
                            <hr>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">My Organizations</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('articles') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Academic</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Non-Academic</li>
                                    </a>
                                </ul>
                            </li>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">My Application</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('articles') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Academic</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Non-Academic</li>
                                    </a>
                                </ul>
                            </li>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">My Messages</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('articles') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Inbox </li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Sent</li>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                <!-- SUPER ADMIN GPOA NAVIGATION -->
                @if($getUserRole == "Super Admin")
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">GPOA Report</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('upcoming-events') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Upcoming Events</li>
                            </a>
                            <a href="{{ route('gpoa-events') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Events</li>
                            </a>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">Partnership</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('approved-partnerships') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Partnership Requests</li>
                                    </a>
                                    <a href="{{ route('partnership-application') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Partnership Application</li>
                                    </a>
                                </ul>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">Reports</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('approved-events') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Approved Events</li>
                                    </a>
                                    <a href="{{ route('disapproved-events') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Disapproved Events</li>
                                    </a>
                                    <a href="{{ route('approved-partnerships') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Accepted Partnerships</li>
                                    </a>
                                    <a href="{{ route('declined-partnerships') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Declined Partnership</li>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                <!-- SUPER ADMIN FINANCIAL NAVIGATION  -->
                @if($getUserRole == "Super Admin")
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Financial Report</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('upcoming-events') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Upcoming Events</li>
                            </a>
                        </ul>
                    </div>
                </div>
                @endif
                <!-- SUPER  ADMIN ACCOMPLISHMENT NAVIGATION -->
                @if($getUserRole == "Super Admin")
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Accomplishment Report</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            @if($getUserRole == 'Super Admin')
                                <a href="{{ route('ar-links') }}">
                                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">AR Menu</li>
                                </a>
                            @endif
                            @if($getUserRole == 'AR Officer Admin')
                                <a href="{{ route('Organization/dashboard') }}">
                                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Dashboard</li>
                                </a>
                                <a href="{{ route('ar-menu') }}">
                                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">AR Menu</li>
                                </a>
                            @endif
                        </ul>
                    </div>
                </div>
                @endif
                
                <!-- ORGANIZATION ADMIN GPOA NAVIGATION -->
                @if($getUserRole == "GPOA Admin")
                <div class="hidden sm:flex sm:items-center sm:ml-6">    
                    <a href="{{ route('Organization/upcoming-events') }}">
                        <div class="group inline-block ">   
                            <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 flex-1">Upcoming Events</span>
                            </button>
                        </div>
                    </a>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">    
                    <a href="{{ route('Organization/gpoa-events') }}">
                        <div class="group inline-block ">   
                            <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 flex-1">Events</span>
                            </button>
                        </div>
                    </a>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Partnership</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('Organization/approved-partnerships') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Partnership Requests</li>
                            </a>
                            <a href="{{ route('Organization/partnership-application') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Partnership Application</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Reports</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('Organization/approved-events') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Approved Events</li>
                            </a>
                            <a href="{{ route('Organization/disapproved-events') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Disapproved Events</li>
                            </a>
                            <a href="{{ route('Organization/approved-partnerships') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Accepted Partnership</li>
                            </a>
                            <a href="{{ route('Organization/declined-partnerships') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Declined Partnership</li>
                            </a>
                        </ul>
                    </div>
                </div>
                @endif

                @if($getUserRole == "Membership Admin")
                <!-- ORGANIZATION ADMIN MEMBERSHIP NAVIGATION -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Organizations</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('Organization/dashboard') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Dashboard</li>
                            </a>
                            <a href="{{ route('Organization/memberships') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Memberships</li>
                            </a>
                            <a href="{{ route('Organization/userManagement') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">User Management</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <a href="{{ route('Organization/membershipsMembers') }}">
                            <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 flex-1">Members</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <a href="{{ route('Organization/paymentDetails') }}">
                            <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 flex-1">Payment Details</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Application</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('Organization/applicationRequest') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Application Rrquests</li>
                            </a>
                            <a href="{{ route('Organization/accountRegistrants') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Account Registrants</li>
                            </a>
                            <a href="{{ route('Organization/declinedApplications') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Declined Aplications</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Messages</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('Organizations/Messages/Inbox') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Inbox</li>
                            </a>
                            <a href="{{ route('Organizations/Messages/Sent') }}">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Sent</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">My Membership</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">My Organizations</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('Organization/MyAcademicOrgs') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Academic</li>
                                    </a>
                                    <a href="{{ route('Organization/MyNonAcademicOrgs') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Non-academic</li>
                                    </a>
                                </ul>
                            </li>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">My Application</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('Organization/MyApplicationAcademic') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Academic</li>
                                    </a>
                                    <a href="{{ route('Organization/MyApplicationNonAcademic') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Non-academic</li>
                                    </a>
                                </ul>
                            </li>
                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button aria-haspopup="true" aria-controls="menu-lang" class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">My Messages</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </span>
                                </button>
                                <ul id="menu-lang" aria-hidden="true" class="ul-id bg-white border rounded-sm absolute top-0 right-0  transition duration-150 ease-in-out origin-top-left min-w-32 ">
                                    <a href="{{ route('Organizations/MyMessages/Inbox') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Inbox</li>
                                    </a>
                                    <a href="{{ route('announcements') }}">
                                        <li class="px-3 py-1 hover:bg-gray-100">Sent</li>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif

                <!-- ORGANIZATION ADMIN ACCOMPLISHMENT NAVIGATION -->
                @if($getUserRole == "AR Officer Admin")
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Event Report</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('articles') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">Create Event</li>
                            </a>
                            <a href="{{ route('Organization/AR-Events') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">View Event</li>
                            </a>
                            <a href="{{ route('Organization/GPOA/AR-Events') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">GPOA Event</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Accomplishment Report</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('articles') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">Create AR</li>
                            </a>
                            <a href="{{ route('Organization/accomplishments') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">Submissions</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Student Report</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('Organization/student-accomplishments') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">Submissions</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Organization Documents</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('articles') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">All Organization Document</li>
                            </a>
                            <a href="{{ route('articles') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">Types</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Officer</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('articles') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">Manage Officer Signature</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="group inline-block ">
                        <button aria-haspopup="true" aria-controls="menu" class="flex items-center block p-2 bg-white bg-gray-100 rounded-md outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1">Accomplishment</span>
                            <span>
                                <svg class="w-6 h-6 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul id="menu" aria-hidden="true" class="ul-id bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                            <a href="{{ route('articles') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">My Accomplishment</li>
                            </a>
                            <a href="{{ route('articles') }}">
                                <li class="px-3 py-1 hover:bg-gray-100">Submit an Accomlishment</li>
                            </a>
                        </ul>
                    </div>
                </div>




                @endif

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->first_name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link wire:click="logoutControll" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->first_name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
