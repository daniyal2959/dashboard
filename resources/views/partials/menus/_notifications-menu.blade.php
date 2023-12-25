<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
	<!--begin::Heading-->
	<div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset('assets/media/misc/menu-header-bg.jpg') }}')">
		<!--begin::Title-->
		<h3 class="text-white fw-semibold px-9 mt-10 mb-6">@lang('dashboard/notification.notifications')
		<span class="fs-8 opacity-75 ps-3">{{ request()->input('notifications')->count() }} @lang('dashboard/notification.not_read')</span></h3>
		<!--end::Title-->
	</div>
	<!--end::Heading-->
    <!--begin::Items-->
    <div class="scroll-y mh-325px my-5 px-8">
        @foreach( request()->input('notifications') as $notification)
            <!--begin::Item-->
            <div class="d-flex flex-stack py-4">
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-35px me-4">
                        <span class="symbol-label bg-light-primary">{!! $notification->data[0]['icon'] !!}</span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="mb-0 me-2">
                        <a href="{{ route('users.show', $notification->data[0]['id']) }}" class="fs-6 text-gray-800 text-hover-primary fw-bold notification-link">@lang('dashboard/notification.new_customer')</a>
                        <div class="text-gray-400 fs-7">@lang('dashboard/notification.new_customer_description', ['user' => $notification->data[0]['name'], 'created_at' => $notification->data[0]['created_at']])</div>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Section-->
                <!--begin::Label-->
                <form action="{{ route('notifications.markAsRead', ['id' => $notification->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent">
                        {!! getIcon('check', 'fs-2') !!}
                    </button>
                </form>
                <!--end::Label-->
            </div>
            <!--end::Item-->
        @endforeach
    </div>
    <!--end::Items-->
    <!--begin::View more-->
    <div class="py-3 text-center border-top">
        <a href="#" class="btn btn-color-gray-600 btn-active-color-primary d-flex justify-content-center align-items-center">
            <span class="me-2">View All</span>
            @if( getLocaleDirection() == 'ltr' )
                {!! getIcon('arrow-right', 'fs-5') !!}
            @else
                {!! getIcon('arrow-left', 'fs-5') !!}
            @endif
        </a>
    </div>
    <!--end::View more-->
</div>
<!--end::Menu-->
