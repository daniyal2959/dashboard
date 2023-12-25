<div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">@lang('dashboard/user.enable_one_time_password')</h2>
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
                <!--begin::Form-->
                <form class="form" id="kt_modal_add_one_time_password_form">
                    <!--begin::Label-->
                    <div class="fw-bold mb-9">@lang('dashboard/user.one_time_password_label')</div>
                    <!--end::Label-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">@lang('dashboard/user.mobile_number')</span>
                            <span class="ms-2" data-bs-toggle="tooltip" title="@lang('dashboard/user.mobile_number_description')">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid text-start" name="otp_mobile_number" placeholder="@lang('dashboard/user.phone_sample')" value="" dir="ltr"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Separator-->
                    <div class="separator saperator-dashed my-5"></div>
                    <!--end::Separator-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">@lang('dashboard/user.email')</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" class="form-control form-control-solid" name="otp_email" value="smith@kpmg.com" readonly="readonly" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">@lang('dashboard/user.confirm_password')</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="password" class="form-control form-control-solid" name="otp_confirm_password" value="" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">@lang('dashboard/user.discard')</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">@lang('dashboard/user.submit')</span>
                            <span class="indicator-progress">@lang('dashboard/user.please_wait')
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
