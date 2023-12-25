<style>
    .dropdown-toggle:empty:after{
        content: unset!important;
    }
</style>

<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px">
    @foreach($supportedLanguages as $language)
        <!--begin::Card-->
        <div class="card card-flush h-md-100" data-language>
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column justify-content-center align-items-between">
                @if($language['locale'] == $locale)
                    <div class="triangle-badge triangle-badge-primary"></div>
                @endif
                <div class="d-flex flex-row align-items-center justify-content-between text-black @isset( $language['progress'] ) mb-8 @endif">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('/storage/flags/' . $language['flag']) }}" alt="" class="rounded-circle me-2" width="48" height="48">
                        <p class="m-0" data-language-title>@lang('dashboard/language.' . \Illuminate\Support\Str::lower($language['name']))</p>
                    </div>

                    <a href="#" class="btn btn-light-primary btn-icon btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="dropdown-toggle ki-duotone ki-down fs-2x"></i>
                    </a>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('languages.show', $language['locale']) }}" class="menu-link px-3">
                                ترجمه کردن متن ها
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('languages.switch', $language['locale']) }}" class="menu-link px-3">
                                @lang('dashboard/language.switch_language')
                            </a>
                        </div>
                        <!--end::Menu item-->
                        @isset( $language['progress'] )
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('languages.evacuate', $language['locale']) }}" class="menu-link px-3" id="evacuate-{{ $language['locale'] }}">
                                    @lang('dashboard/language.evacuate')
                                </a>
                            </div>
                            <!--end::Menu item-->
                        @endisset
                    </div>
                </div>

                @isset( $language['progress'] )
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $language['progress']['color'] }}" role="progressbar" style="width: {{ $language['progress']['rate'] }}%" aria-valuenow="{{ $language['progress']['rate'] }}" aria-valuemin="0" aria-valuemax="100">
                            <span>{{$language['progress']['rate']}}%</span>
                        </div>
                    </div>
                @endisset
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    @endforeach
</div>

@push('scripts')
    <script>
        document.querySelectorAll('[data-language]').forEach( language => {
            language.querySelectorAll('a[id^="evacuate-"]').forEach( evacuateLink => {
                evacuateLink.addEventListener('click', e => {
                    e.preventDefault();

                    Swal.fire({
                        title: language.querySelector('[data-language-title]').textContent,
                        text: '{{ trans('dashboard/language.evacuate_question') }}',
                        icon: 'question',
                        confirmButtonText: '{{ trans('dashboard/language.evacuate_confirm_button') }}',
                        showCancelButton: true,
                        cancelButtonText: '{{ trans('dashboard/language.evacuate_cancel_button') }}'
                    }).then( result => {
                        if( result.isConfirmed ){
                            window.location.href = evacuateLink.getAttribute('href');
                        }
                    } )
                })
            } )
        } )
    </script>
@endpush
