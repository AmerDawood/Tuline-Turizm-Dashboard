

<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">{{ __('site.dashboard') }}</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarDashboards">
        <ul class="nav nav-sm flex-column">

            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link" data-key="t-crm"> {{ __('site.dashboard') }} </a>
            </li>
            {{-- <li class="nav-item">
                <a href="" class="nav-link" data-key="t-analytics"> Website </a>
            </li> --}}

        </ul>
    </div>
</li> <!-- end Dashboard Menu -->


<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarSections" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSections">
        <i class="ri-rocket-line"></i> <span data-key="t-landing">Sections</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarSections">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('sections.index') }}" class="nav-link" data-key="t-one-page"> All Sections </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('sections.create') }}" class="nav-link" data-key="t-nft-landing">Add Sections </a>
            </li>

        </ul>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUsers">
        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">{{ __('site.areas') }}</span>
    </a>
    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUsers">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('areas.index') }}" class="nav-link" data-key="t-alerts">{{ __('site.all_areas') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('areas.create') }}" class="nav-link" data-key="t-badges">{{ __('site.add_areas') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li>



<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarOffers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOffers">
        <i class="ri-rocket-line"></i> <span data-key="t-landing">{{ __('site.offers') }}</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarOffers">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('offers.index') }}" class="nav-link" data-key="t-one-page"> {{ __('site.all_offer') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('offers.create') }}" class="nav-link" data-key="t-nft-landing"> {{ __('site.add_offer') }} </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarSlider" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSlider">
        <i class="ri-rocket-line"></i> <span data-key="t-landing">{{ __('site.slider') }}</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarSlider">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link" data-key="t-one-page">{{ __('site.all_slider') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sliders.create') }}" class="nav-link" data-key="t-nft-landing">{{ __('site.add_slider') }}</a>
            </li>
        </ul>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarLandingAnnotation" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLandingAnnotation">
        <i class="ri-rocket-line"></i> <span data-key="t-landing">{{ __('site.services') }}</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarLandingAnnotation">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('services.index') }}" class="nav-link" data-key="t-one-page"> {{ __('site.all_services') }} </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('services.create') }}" class="nav-link" data-key="t-nft-landing"> {{ __('site.add_services') }} </a>
            </li>

        </ul>
    </div>
</li>



{{-- <li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarTravels" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTravels">
        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">{{ __('site.travels') }}</span>
    </a>
    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarTravels">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('travels.index') }}" class="nav-link" data-key="t-alerts">{{ __('site.all_travels') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('travels.create') }}" class="nav-link" data-key="t-badges">{{ __('site.add_travels') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li> --}}



<a href="{{ route('getevent') }}">
<li class="nav-item">
    <a class="nav-link menu-link" href="{{ route('getevent') }}" data-bs-toggle="collapse role="button aria-expanded="false" aria-controls="sidebarPages">


            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('site.calender') }}</span>


    </a>

</li>

</a>


<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarBooking" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBooking">
        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">All Users</span>
    </a>
    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarBooking">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link" data-key="t-alerts">All Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link" data-key="t-badges">Add User</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarAdmins" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdmins">
        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">{{ __('site.admins') }}</span>
    </a>
    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarAdmins">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.all') }}" class="nav-link" data-key="t-alerts">{{ __('site.all_admins') }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('admin.create') }}" class="nav-link" data-key="t-badges">{{ __('site.add_admins') }}</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarLanguage" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanguage">
        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">{{ __('site.language') }}</span>
    </a>
    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarLanguage">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('languages.index') }}" class="nav-link" data-key="t-badges">All Language</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('languages.create') }}" class="nav-link" data-key="t-alerts">Add Language</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#sidebarFaqs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarFaqs">
        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">FAQs</span>
    </a>
    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarFaqs">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('faqs.index') }}" class="nav-link" data-key="t-alerts">All FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faqs.create') }}" class="nav-link" data-key="t-badges">Add FAQs</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#settings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settings">
        <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">{{ __('site.settings') }}</span>
    </a>
    <div class="collapse menu-dropdown mega-dropdown-menu" id="settings">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">


                    <li class="nav-item">
                        <a href="{{ route('privacy.index') }}" class="nav-link" data-key="t-alerts">{{ __('site.privacy') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('aboutApp.index') }}" class="nav-link" data-key="t-badges">About App</a>
                    </li>
                    <a href="">
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('theme.index') }}" data-bs-toggle="collapse role="button aria-expanded="false" aria-controls="sidebarPages">

                                    <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('site.app_theme') }}</span>
                            </a>

                        </li>

                        </a>


                </ul>
            </div>
        </div>
    </div>
</li>


<a href="">
    <li class="nav-item">
        <a class="nav-link menu-link" href="{{ route('chat.index') }}" data-bs-toggle="collapse role="button aria-expanded="false" aria-controls="sidebarPages">

                <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">Chat</span>

        </a>

    </li>

    </a>









    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarNotifications" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarNotifications">
            <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">{{ __('site.notification') }}</span>
        </a>
        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarNotifications">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('notification.create') }}" class="nav-link" data-key="t-badges">{{ __('site.send_notification') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>










