@foreach($root->children() as $menu)
    <!--begin:Menu item-->
    <div class="menu-item">
        <!--begin:Menu link-->
        <a class="menu-link" href="{{ $menu->url() }}" target="_blank" title="{{ $menu->tooltip }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="{{ $menu->tooltip_placement }}">
            <span class="menu-icon">{!! $menu->icon !!}</span>
            <span class="menu-title">{{ $menu->title }}</span>
        </a>
        <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
@endforeach
