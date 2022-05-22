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

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- SUPER ADMIN NAVIGATION -->
                @if($getUserRole == "Super Admin")
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Homepage</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('default-interfaces') }}" class="">
                                        Dashbaord
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('organizations') }}" class="">
                                        Organization
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('articles') }}" class="">
                                        News
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('announcements') }}" class="">
                                        Announcement
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('roles') }}" class="">
                                        Roles
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('sub-links') }}" class="">
                                        Gate SubLinks
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('users') }}" class="">
                                        Users
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('officers') }}" class="">
                                        Officers
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Membership</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="" class="">
                                        Organization
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Application
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Messages
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        My Organization
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        My Application
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        My Messages
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Gpoa</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="" class="">
                                        Upcoming Event
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Event
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Partnership
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Reports
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Financial</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="" class="">
                                        Upcoming Event
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Event
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Partnership
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Reports
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
                <!-- HOMEPAGE ADMIN NAVIGATION -->
                @if($getUserRole == "Home Page Admin")
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Homepage</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('default-interfaces') }}" class="">
                                        Dashbaord
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/organizations') }}" class="">
                                        Organization
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/articles') }}" class="">
                                        News
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/announcements') }}" class="">
                                        Announcement
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/officers') }}" class="">
                                        Officers
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/socials') }}" class="">
                                        Socials
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
                <!-- GPOA ADMIN NAVIGATION -->
                @if($getUserRole == "GPOA Admin")
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Upcoming Events</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/upcoming-events') }}" class="">
                                        Upcoming Event
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Events</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/gpoa-events') }}" class="">
                                        Event
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Partnership</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/approved-partnerships') }}" class="">
                                        Partnership Requests
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/partnership-application') }}" class="">
                                        Partnership Application
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Reports</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/approved-events') }}" class="">
                                        Approved Events
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/disapproved-events') }}" class="">
                                        Disapproved Events
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/approved-partnerships') }}" class="">
                                        Accepted Partnership
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/declined-partnerships') }}" class="">
                                        Declined Partnership
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
                <!-- MEMBERSHIP ADMIN NAVIGATION -->
                @if($getUserRole == "Membership Admin")
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Organization</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/dashboard') }}" class="">
                                        Dashboard
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/memberships') }}" class="">
                                        Memberships
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/userManagement') }}" class="">
                                        User Management
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('My Organization') }}
                                    </div>
                                    <x-jet-dropdown-link href="{{ route('Organization/MyAcademicOrgs') }}" class="">
                                        Academic
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/MyNonAcademicOrgs') }}" class="">
                                        Non-Academic
                                    </x-jet-dropdown-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div> 
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <a href="{{ route('Organization/membershipsMembers') }}">
                                        <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                            <span class="" >Members</span>
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                            </x-slot>
                        </x-jet-dropdown>
                    </div>                
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <a href="{{ route('Organization/paymentDetails') }}">
                                        <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                            <span class="" >Payment Details</span>
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                            </x-slot>
                        </x-jet-dropdown>
                    </div>                
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Application</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/applicationRequest') }}" class="">
                                        Application Requests
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/accountRegistrants') }}" class="">
                                        Account Registrants
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/declinedApplications') }}" class="">
                                        Declined Applications
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('My Application') }}
                                    </div>
                                    <x-jet-dropdown-link href="{{ route('Organization/MyApplicationAcademic') }}" class="">
                                        Academic
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/MyApplicationNonAcademic') }}" class="">
                                        Non-Academic
                                    </x-jet-dropdown-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Messages</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organizations/Messages/Inbox') }}" class="">
                                        Inbox 
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organizations/Messages/Sent') }}" class="">
                                        Sent
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('My Messages') }}
                                    </div>
                                    <x-jet-dropdown-link href="{{ route('Organizations/MyMessages/Inbox') }}" class="">
                                        Inbox
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="#" class="">
                                        Sent wala pa to
                                    </x-jet-dropdown-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
                <!-- ACCOMPLISHMENT ADMIN NAVIGATION -->
                @if($getUserRole == "AR Officer Admin" || $getUserRole == "AR President Admin")
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Event Report</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/AR-Events') }}" class="">
                                        View Event
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('Organization/GPOA/AR-Events') }}" class="">
                                        Gpoa Event
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <a href="{{ route('Organization/accomplishments') }}">
                                        <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                            <span class="" >Accomplishment Report</span>
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <a href="{{ route('Organization/student-accomplishments') }}">
                                        <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                            <span class="" >Student Report</span>
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Organization Documents</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="" class="">
                                        All Organization Document
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Types
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Officers</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{ route('Organization/OfficerSignatures') }}" class="">
                                        Manages Officer Signature
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="frontpage-nav-bar-design inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-opacity-0 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none focus:bg-yellow-50 focus:text-white transition text-white">
                                        <span class="" >Accomplishment</span>
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <x-jet-dropdown-link href="{{route('Organization/myAccomplishments')}}" class="">
                                        My Accomplishment
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="" class="">
                                        Submit an Accomplishment
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
                </div>
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
