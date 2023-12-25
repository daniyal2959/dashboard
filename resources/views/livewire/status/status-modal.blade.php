<div class="modal fade" id="kt_modal_update_status" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                @empty($name)
                    <h2 class="fw-bold">@lang('dashboard/status.store_status')</h2>
                @else
                    <h2 class="fw-bold">@lang('dashboard/status.update_status')</h2>
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
                <!--begin::Form-->
                <form id="kt_modal_update_status_form" class="form" action="#" wire:submit.prevent="submit">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">@lang('dashboard/status.name')</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="@lang('dashboard/status.name_placeholder')" name="name" wire:model.defer="name"/>
                        <!--end::Input-->
                        @error('name')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 col-6">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mb-2">
                                <span class="required">@lang('dashboard/status.back_color')</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <x-color-picker name="back_color"/>
                            <!--end::Input-->
                            @error('back_color')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 col-6">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mb-2">
                                <span class="required">@lang('dashboard/status.text_color')</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <x-color-picker name="text_color"/>
                            <!--end::Input-->
                            @error('text_color')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">@lang('dashboard/status.discard')</button>
                        <button type="submit" class="btn btn-primary">
                            @empty($name)
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/status.submit')</span>
                            @else
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/status.update')</span>
                            @endempty
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                @lang('dashboard/status.please_wait')
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
        const modal = document.querySelector('#kt_modal_update_status');

        modal.addEventListener('show.bs.modal', (e) => {
            Livewire.emit('modal.show.status_id', e.relatedTarget.getAttribute('data-status-id'));
        });

        document.querySelector('.color-picker[name="text_color"]').addEventListener('load', () => console.log(@this.text_color));
    </script>
@endpush
