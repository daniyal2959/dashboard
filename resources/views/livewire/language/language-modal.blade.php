<div class="modal fade" id="kt_modal_update_language" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                @empty($name)
                    <h2 class="fw-bold">@lang('dashboard/language.update_language')</h2>
                @else
                    <h2 class="fw-bold">@lang('dashboard/language.update_language')</h2>
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
                <form id="kt_modal_update_language_form" class="form" action="#" wire:submit.prevent="submit">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">@lang('dashboard/language.name')</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="language" id="language" class="form-select form-select-solid" wire:model.defer="name" data-control="select2" data-placeholder="@lang('dashboard/language.enter_a_language_name')">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <option value="{{ $properties['name'] }}" data-excerpt="{{ $localeCode }}">@lang('dashboard/language.' . \Illuminate\Support\Str::lower($properties['name']))</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                        @error('language')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">@lang('dashboard/language.discard')</button>
                        <button type="submit" class="btn btn-primary">
                            @empty($name)
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/language.submit')</span>
                            @else
                                <span class="indicator-label" wire:loading.remove>@lang('dashboard/language.update')</span>
                            @endempty
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                @lang('dashboard/language.please_wait')
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
        const modal = document.querySelector('#kt_modal_update_language');

        modal.addEventListener('show.bs.modal', (e) => {
            Livewire.emit('modal.show.language_id', e.relatedTarget.getAttribute('data-language-id'));
        });

        document.querySelector('#language').addEventListener('select2:select', e => {
            console.log('select2')
            // document.querySelector('#excerpt').value = e.target.options[e.target.selectedIndex].getAttribute('data-excerpt');
            @this.set('excerpt', e.target.options[e.target.selectedIndex].getAttribute('data-excerpt'));
        });

        document.querySelector('#language').addEventListener('input', e => {
            console.log('select')
            // document.querySelector('#excerpt').value = e.target.options[e.target.selectedIndex].getAttribute('data-excerpt');
            @this.set('excerpt', e.target.options[e.target.selectedIndex].getAttribute('data-excerpt'));
        });
    </script>
@endpush
