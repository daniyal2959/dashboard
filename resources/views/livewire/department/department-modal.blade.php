<div class="modal fade" id="kt_modal_update_department" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                @empty( $name )
                    <h2 class="fw-bold">@lang('dashboard/department.store_department')</h2>
                @else
                    <h2 class="fw-bold">@lang('dashboard/department.update_department')</h2>
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
                <form id="kt_modal_update_department_form" class="form" action="#" wire:submit.prevent="submit">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">@lang('dashboard/department.name')</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="@lang('dashboard/department.enter_a_department_name')" name="name" wire:model.defer="name"/>
                        <!--end::Input-->
                        @error('name')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">@lang('dashboard/department.discard')</button>
                        <button type="submit" class="btn btn-primary">
                            @empty( $name )
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/department.submit')</span>
                            @else
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/department.update')</span>
                            @endempty
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                @lang('dashboard/department.please_wait')
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
        const modal = document.querySelector('#kt_modal_update_department');

        modal.addEventListener('show.bs.modal', (e) => {
            Livewire.emit('modal.show.department_id', e.relatedTarget.getAttribute('data-department-id'));
        });
    </script>
@endpush
