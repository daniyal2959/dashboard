<div class="modal fade" id="kt_modal_add_auth_app" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">@lang('dashboard/user.add_authenticator_app')</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Content-->
                <div class="fw-bold d-flex flex-column justify-content-center mb-5">
                    <!--begin::Label-->
                    <div class="text-center mb-5" data-kt-add-auth-action="qr-code-label">@lang('dashboard/user.authenticator_app_description_part1')
                        <a href="#">@lang('dashboard/user.authenticator_app_description_part2')</a>@lang('dashboard/user.authenticator_app_description_part3')
                    </div>
                    <div class="text-center mb-5 d-none" data-kt-add-auth-action="text-code-label">@lang('dashboard/user.authenticator_app_description_part1')
                        <a href="#">@lang('dashboard/user.authenticator_app_description_part2')</a>@lang('dashboard/user.authenticator_app_description_part3')
                    </div>
                    <!--end::Label-->
                    <!--begin::QR code-->
                    <div class="d-flex flex-center" data-kt-add-auth-action="qr-code">
                        <img src="{{ image('misc/qr.png') }}" alt="Scan this QR code" />
                    </div>
                    <!--end::QR code-->
                    <!--begin::Text code-->
                    <div class="border rounded p-5 d-flex flex-center" data-kt-add-auth-action="text-code">
                        <div class="fs-1">gi2kdnb54is709j</div>
                    </div>
                    <!--end::Text code-->
                </div>
                <!--end::Content-->
                <!--begin::Action-->
                <div class="d-flex flex-center">
                    <div class="btn btn-light-primary me-3" data-kt-add-auth-action="text-code-button">@lang('dashboard/user.enter_code_manually')</div>
                    <div class="btn btn-light-primary ms-3" data-kt-add-auth-action="qr-code-button">@lang('dashboard/user.scan_barcode_instead')</div>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
