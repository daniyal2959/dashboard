<!--begin::Alert-->
<div class="alert alert-{{$status}} d-flex align-items-center p-5">
    <!--begin::Icon-->
    <i class="ki-duotone ki-shield-tick fs-2hx text-{{$status}} me-4"><span class="path1"></span><span class="path2"></span></i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h4 class="mb-1 text-{{$status}}">{{ $title }}</h4>
        <!--end::Title-->

        <!--begin::Content-->
        <span>{{ $message }}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->
