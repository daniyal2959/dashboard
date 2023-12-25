<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
            @foreach($sidebar->roots() as $group)
                @can($group->permission)
                    <!--begin:Menu item-->
                    <div class="menu-item pt-5">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('dashboard.' . $group->title) }}</span>
                        </div>
                        <!--end:Menu content-->
                    </div>
                    <!--end:Menu item-->

                    @foreach($group->children() as $menu)
                        @can($menu->permission)
                            @if( $menu->hasChildren() )
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs($menu->route_check) ? 'here show' : '' }}">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">{!! $menu->icon !!}</span>
                                        <span class="menu-title">{{ trans('dashboard.'.$menu->title) }}</span>
                                        @if( $menu->hasChildren() )
                                            <span class="menu-arrow"></span>
                                        @endif
                                    </span>
                                    <!--end:Menu link-->
                                    @if( $menu->hasChildren() )
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion">
                                            @foreach( $menu->children() as $child )
                                                @can($child->permission)
                                                    <!--begin:Menu item-->
                                                    <div class="menu-item">
                                                        <!--begin:Menu link-->
                                                        <a class="menu-link {{ request()->routeIs($child->route_check) ? 'active' : '' }}" href="{{ $child->url() }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">{{ trans('dashboard.' . $child->title) }}</span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->
                                                @endcan
                                            @endforeach
                                        </div>
                                        <!--end:Menu sub-->
                                    @endif
                                </div>
                                <!--end:Menu item-->
                            @else
                                <!--begin:Menu item-->
                                <div class="menu-item {{ request()->routeIs($menu->route_check) ? 'here show' : '' }}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ $menu->url() }}">
                                        <span class="menu-icon">{!! $menu->icon !!}</span>
                                        <span class="menu-title">{{ trans('dashboard.' . $menu->title) }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            @endif
                        @endcan
                    @endforeach
                @endcan
            @endforeach
		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
