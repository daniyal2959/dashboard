<!--begin:Row-->
<div class="row">
	<!--begin:Col-->
	<div class="col-lg-8">
		<!--begin:Row-->
		<div class="row">
            @foreach($menu->children() as $group)
                <!--begin:Col-->
                <div class="col-lg-3 mb-6 mb-lg-0">
                    <!--begin:Menu heading-->
                    <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">{{ $group->title }}</h4>
                    <!--end:Menu heading-->
                    @foreach($group->children() as $item)
                        <!--begin:Menu item-->
                        <div class="menu-item p-0 m-0">
                            <!--begin:Menu link-->
                            <a href="{{ $item->url() }}" class="menu-link">
                                <span class="menu-title">{{ $item->title }}</span>
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
	<div class="col-lg-4">
		<img src="{{ $menu->image }}" class="rounded mw-100" alt="" />
	</div>
	<!--end:Col-->
</div>
<!--end:Row-->
