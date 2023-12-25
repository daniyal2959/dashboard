<div class="modal fade" id="kt_modal_update_permission" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                @empty($name)
                    <h2 class="fw-bold">@lang('dashboard/permission.store_permission')</h2>
                @else
                    <h2 class="fw-bold">@lang('dashboard/permission.update_permission')</h2>
                @endempty
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Notice-->
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                    <!--begin::Icon-->
                    {!! getIcon('information','fs-2tx text-warning me-4') !!}
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                            <div class="fs-6 text-gray-700">
                                <strong class="me-1">@lang('dashboard/permission.warning')!</strong>@lang('dashboard/permission.permission_notice')
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Form-->
                <form id="kt_modal_update_permission_form" class="form" action="#" wire:submit.prevent="submit">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">@lang('dashboard/permission.name')</span>
                            <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission names is required to be unique.">
                                {!! getIcon('information','fs-7') !!}
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="@lang('dashboard/permission.name_placeholder')" name="name" wire:model.defer="name"/>
                        <!--end::Input-->
                        @error('name')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">@lang('dashboard/permission.discard')</button>
                        <button type="submit" class="btn btn-primary">
                            @empty($name)
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/permission.submit')</span>
                            @else
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/permission.update')</span>
                            @endempty
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                @lang('dashboard/permission.please_wait')
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
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

@push('scripts')
    <script>
        const modal = document.querySelector('#kt_modal_update_permission');

        modal.addEventListener('show.bs.modal', (e) => {
            Livewire.emit('modal.show.permission_name', e.relatedTarget.getAttribute('data-permission-id'));
        });
    </script>
@endpush
