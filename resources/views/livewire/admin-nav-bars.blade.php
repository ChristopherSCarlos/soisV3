<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>     
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div style="">
        <div id="" style="background:maroon;" x-data="{ open: false }" class="flex flex-col  md:items-center md:justify-between md:flex-row  md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="{{ url('/')}}" class="flex text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <img class="h-8" src="{{ asset('image/svg/pup.svg') }}">
                    <p  id="" class="ml-2 text-white">SOIS</p>
                </a>
                <button style="color:white" class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <!-- SUPER ADMIN NAVIGATION -->
            @if($getUserRole == "Super Admin" || $getUserRole == "Head of Student Services")
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Homepage</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        @if($getUserRole == "Super Admin")
                            <x-jet-dropdown-link href="{{ route('default-interfaces') }}" class="">
                                Dashbaord
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('superorganization') }}" class="">
                                Organizations
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('viewarticles') }}" class="">
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
                        @endif
                        @if($getUserRole == "Head of Student Services")
                            <x-jet-dropdown-link href="{{ route('admin-default-interfaces') }}" class="">
                                Dashbaord
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('admin-org') }}" class="">
                                Organizations
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('adminArticles') }}" class="">
                                News
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('adminAnnouncements') }}" class="">
                                Announcement
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('adminSub-links') }}" class="">
                                Gate SubLinks
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('Adminusers') }}" class="">
                                Users
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('Adminofficers') }}" class="">
                                Officers
                            </x-jet-dropdown-link>
                        @endif
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Membership</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        @if($getUserRole == "Super Admin")
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Organization') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAmemberships') }}" class="">
                                Membership
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAUserManagement') }}" class="">
                                User Management
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('My Organization') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAAcademicOrganization') }}" class="">
                                Academic
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SANonAcademicOrganization') }}" class="">
                                Non-Academic
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Application') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAApplicationReqeusts') }}" class="">
                                Application Requests
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAAccountRegistrants') }}" class="">
                                Account Registrants
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SADeclinedApplication') }}" class="">
                                Declined Applications
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('My Application') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAAcademicApplication') }}" class="">
                                Academic
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SANonAcademicApplication') }}" class="">
                                Non-Academic
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Messages') }}
                            </div>
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

                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Others') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAMembershipMembers') }}" class="">
                                Members
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAPaymentDetails') }}" class="">
                                Payment Details
                            </x-jet-dropdown-link>
                        @endif
                        @if($getUserRole == "Head of Student Services")
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Organization') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('Adminmemberships') }}" class="">
                                Membership
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminUserManagement') }}" class="">
                                User Management
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('My Organization') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminAcademicOrganization') }}" class="">
                                Academic
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminNonAcademicOrganization') }}" class="">
                                Non-Academic
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Application') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminApplicationReqeusts') }}" class="">
                                Application Requests
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminAccountRegistrants') }}" class="">
                                Account Registrants
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminDeclinedApplication') }}" class="">
                                Declined Applications
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('My Application') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminAcademicApplication') }}" class="">
                                Academic
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminNonAcademicApplication') }}" class="">
                                Non-Academic
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Messages') }}
                            </div>
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

                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Others') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminMembershipMembers') }}" class="">
                                Members
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminPaymentDetails') }}" class="">
                                Payment Details
                            </x-jet-dropdown-link>
                        @endif
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">GPOA</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        @if($getUserRole == "Super Admin")
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Partnership') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAPartnershipRequests') }}" class="">
                                Partnership Request
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAPartnershipApplication') }}" class="">
                                Partnership Application
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Reports') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAApprovedEvents') }}" class="">
                                Approved Reports
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SADisApprovedEvents') }}" class="">
                                Disapproved Events
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAApprovedPartnership') }}" class="">
                                Accepted Partnership
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SADeclinedPartnership') }}" class="">
                                Declined Partnership
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Others') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAUpcomingEvents') }}" class="">
                                Upcoming Events
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAAccomplishedEvents') }}" class="">
                                Events
                            </x-jet-dropdown-link>
                        @endif
                        @if($getUserRole == "Head of Student Services")
                        <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Partnership') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminPartnershipRequests') }}" class="">
                                Partnership Request
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminPartnershipApplication') }}" class="">
                                Partnership Application
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Reports') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminApprovedEvents') }}" class="">
                                Approved Reports
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminDisApprovedEvents') }}" class="">
                                Disapproved Events
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminApprovedPartnership') }}" class="">
                                Accepted Partnership
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminDeclinedPartnership') }}" class="">
                                Declined Partnership
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Others') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminUpcomingEvents') }}" class="">
                                Upcoming Events
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminAccomplishedEvents') }}" class="">
                                Events
                            </x-jet-dropdown-link>
                        @endif
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Accomplishment</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        @if($getUserRole == "Super Admin")
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Event Report') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAAREvents') }}" class="">
                                View Event
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAARGpoaEvents') }}" class="">
                                Gpoa Event
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Organization Documents') }}
                            </div>
                            <x-jet-dropdown-link href="" class="">
                                All Organization Document
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="" class="">
                                Types
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Officers') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAAROfficerSignature') }}" class="">
                                Manages Officer Signature
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Accomplishments') }}
                            </div>
                            <x-jet-dropdown-link href="{{route('SAARCompiledAccomplishments')}}" class="">
                                My Accomplishment
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{route('SAARSubmitAccomplishments')}}" class="">
                                Submit an Accomplishment
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Others') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('SAARAccomplishmentReports') }}" class="">
                                Accomplishment Report
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('SAARStudentAccomplishments') }}" class="">
                                Student Report
                            </x-jet-dropdown-link>
                        @endif
                        @if($getUserRole == "Head of Student Services")
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Event Report') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminAREvents') }}" class="">
                                View Event
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminARGpoaEvents') }}" class="">
                                Gpoa Event
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Organization Documents') }}
                            </div>
                            <x-jet-dropdown-link href="" class="">
                                All Organization Document
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="" class="">
                                Types
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Officers') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminAROfficerSignature') }}" class="">
                                Manages Officer Signature
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Accomplishments') }}
                            </div>
                            <x-jet-dropdown-link href="{{route('AdminARCompiledAccomplishments')}}" class="">
                                My Accomplishment
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{route('AdminARSubmitAccomplishments')}}" class="">
                                Submit an Accomplishment
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Others') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('AdminARAccomplishmentReports') }}" class="">
                                Accomplishment Report
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('AdminARStudentAccomplishments') }}" class="">
                                Student Report
                            </x-jet-dropdown-link>
                        @endif
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Financial</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        @if($getUserRole == "Super Admin")
                            <x-jet-dropdown-link href="{{ route('default-interfaces') }}" class="">
                                Dashbaord
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('superorganization') }}" class="">
                                Organizations
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('viewarticles') }}" class="">
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
                        @endif
                    </div>
                </div>
            @endif
            <!-- HOMEPAGE ADMIN NAVIGATION  -->
            @if($getUserRole == "Home Page Admin")
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Home Page</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        @if($getUserRole == "Home Page Admin")
                            <div class="w-60">
                                <x-jet-dropdown-link href="{{ route('Organization/dashboard') }}" class="">
                                    Dashbaord
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('Organization/organizations') }}" class="">
                                    Organization
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('Organization/articles') }}" class="">
                                    News
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('OrganizationAnnouncements') }}" class="">
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
                        @endif
                    </div>
                </div>
            @endif
            <!-- GPOA ADMIN NAVIGATION  -->
            @if($getUserRole == "GPOA Admin")
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <a href="{{ route('Organization/upcoming-events') }}" class="frontpage-nav-button" style="">
                            <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <span class="ml-1">Upcoming Events</span>
                            </button>
                        </a>
                    </span>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <a href="{{ route('Organization/gpoa-events') }}" class="frontpage-nav-button" style="">
                            <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <span class="ml-1"> Events</span>
                            </button>
                        </a>
                    </span>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Partnership</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        <div class="w-60">
                            <x-jet-dropdown-link href="{{ route('Organization/approved-partnerships') }}" class="">
                                Partnership Requests
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('Organization/partnership-application') }}" class="">
                                Partnership Application
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Reports</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
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
                    </div>
                </div>
            @endif
            <!-- MEMBERSHIP ADMIN NAVIGATION  -->
            @if($getUserRole == "Membership Admin")
                <div class="Panel ">
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
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <a href="{{ route('Organization/membershipsMembers') }}" class="frontpage-nav-button" style="">
                            <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <span class="ml-1"> Members</span>
                            </button>
                        </a>
                    </span>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <a href="{{ route('Organization/gpoa-events') }}" class="frontpage-nav-button" style="">
                            <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <span class="ml-1">Payment Details</span>
                            </button>
                        </a>
                    </span>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Application</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
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
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Messages</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
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
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- ACCOMPLISHMENT ADMIN NAVIGATION -->
            @if($getUserRole == "AR Officer Admin" || $getUserRole == "AR President Admin")
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Event Report</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        <div class="w-60">
                            <x-jet-dropdown-link href="{{ route('Organization/AR-Events') }}" class="">
                                View Event
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="{{ route('Organization/GPOA/AR-Events') }}" class="">
                                Gpoa Event
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <a href="{{ route('Organization/accomplishments') }}" class="frontpage-nav-button" style="">
                            <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <span class="ml-1"> Accomplishment Reeport</span>
                            </button>
                        </a>
                    </span>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <a href="{{ route('Organization/student-accomplishments') }}" class="frontpage-nav-button" style="">
                            <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <span class="ml-1"> Student Reeport</span>
                            </button>
                        </a>
                    </span>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Organization Documents</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        <div class="w-60">
                            <x-jet-dropdown-link href="" class="">
                                All Organization Document
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="" class="">
                                Types
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Officers</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        <div class="w-60">
                            <x-jet-dropdown-link href="{{ route('Organization/OfficerSignatures') }}" class="">
                                Manages Officer Signature
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
                <div class="Panel ">
                    <span class="inline-flex rounded-md">
                        <button class=" frontpage-nav-bar-design inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  px-4 py-2 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-users"></i>
                            <span class="ml-1">Accomplishments</span>
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        <div class="w-60">
                            <x-jet-dropdown-link href="{{route('Organization/myAccomplishments')}}" class="">
                                My Accomplishment
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="" class="">
                                Submit an Accomplishment
                            </x-jet-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- LOGIN NAVIGATION  -->
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
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex-shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name }}" />
                            </div>
                        @endif
                    </div>
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
