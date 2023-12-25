<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                @if(Auth::user()->profile_photo_url)
                    <img alt="Logo" src="{{ Auth::user()->profile_photo_url }}"/>
                @else
                    <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                @endif
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name}}</div>
                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('users.show', \Illuminate\Support\Facades\Auth::id()) }}" class="menu-link px-5">@lang('dashboard/topbar.my_profile')</a>
    </div>
    <!--end::Menu item-->
{{--    <!--begin::Menu item-->--}}
{{--    <div class="menu-item px-5">--}}
{{--        <a href="#" class="menu-link px-5">--}}
{{--            <span class="menu-text">My Projects</span>--}}
{{--            <span class="menu-badge">--}}
{{--                <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>--}}
{{--            </span>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <!--end::Menu item-->--}}
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" @if(isRtlDirection()) data-kt-menu-placement="left-start" @else data-kt-menu-placement="right-start" @endif data-kt-menu-offset="-15px, 0">
        <a href="#" class="menu-link px-5">
			<span class="menu-title position-relative">
                @lang('dashboard/topbar.mode')
			    <span class="ms-5 position-absolute translate-middle-y top-50 end-0">{!! getIcon('night-day', 'theme-light-show fs-2') !!} {!! getIcon('moon', 'theme-dark-show fs-2') !!}</span>
            </span>
		</a>
		@include('partials/theme-mode/__menu')
	</div>
	<!--end::Menu item-->
	<!--begin::Menu item-->
	<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" @if(isRtlDirection()) data-kt-menu-placement="left-start" @else data-kt-menu-placement="right-start" @endif data-kt-menu-offset="-15px, 0">
		<a href="#" class="menu-link px-5">
            <span class="menu-title position-relative">
                @lang('dashboard/topbar.language')
                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                    @php $currentLanguage = request()->input('languages')[App::getLocale()]; @endphp
                    @lang('dashboard/language.' . $currentLanguage['name'])
                    <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('/storage/flags/' . $currentLanguage['flag']) }}" alt="" />
                </span>
            </span>
        </a>
        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-500px w-xl-700px p-4">
            <div class="row row-cols-4">
                @foreach( request()->input('languages') as $locale => $language )
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('languages.switch', $locale) }}" class="menu-link d-flex px-5 @if(App::getLocale() == $locale) active @endif">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="{{ asset('/storage/flags/' . $language['flag']) }}" alt=""/>
                        </span>
                            @lang('dashboard/language.' . $language['name'])
                        </a>
                    </div>
                    <!--end::Menu item-->
                @endforeach
            </div>
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a class="button-ajax menu-link px-5" href="#" data-action="{{ route('logout') }}" data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true">
            @lang('dashboard/topbar.sign_out')
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::User account menu-->
