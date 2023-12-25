<!--begin:Dashboards menu-->
<div class="menu-active-bg pt-1 pb-3 px-3 py-lg-6 px-lg-6" data-kt-menu-dismiss="true">
	<!--begin:Row-->
	<div class="row">
		<!--begin:Col-->
		<div class="col-lg-7">
			<!--begin:Row-->
			<div class="row">
                @foreach( $root->children() as $menu )
                    <!--begin:Col-->
                    <div class="col-lg-{{ 12 / $root->children()->count() }} mb-3">
                        <!--begin:Heading-->
                        <h4 class="fs-6 fs-lg-4 text-gray-800 fw-bold mt-3 mb-3 ms-4">
                            @if( $menu->icon )
                                <span class="menu-icon">{!! $menu->icon !!}</span>
                            @endif
                            <span>{{ $menu->title }}</span>
                        </h4>
                        <!--end:Heading-->
                        @foreach($menu->children() as $group)
                            <!--begin:Menu item-->
                            <div class="menu-item p-0 m-0">
                                <!--begin:Menu link-->
                                <a href="{{ $group->url() }}" class="menu-link" @if($group->tooltip) title="{{ $group->tooltip }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="{{ $group->tooltip_placement }}" @endif>
                                    @if( $group->icon )
                                        <span class="menu-icon">{!! $group->icon !!}</span>
                                    @else
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span>
                                        </span>
                                    @endif
                                    <span class="menu-title">{{ $group->title }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        @endforeach
                    </div>
                    <!--end:Col-->
                @endforeach
			</div>
			<!--end:Row-->
		</div>
		<!--end:Col-->
		<!--begin:Col-->
		<div class="col-lg-5 mb-3 py-lg-3 pe-lg-8 d-flex align-items-center">
			<img src="{{ $root->image }}" class="rounded mw-100" alt="" />
		</div>
		<!--end:Col-->
	</div>
	<!--end:Row-->
</div>
<!--end:Dashboards menu-->
