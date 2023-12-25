<x-default-layout>

    @section('title')
        @lang('dashboard.languages')
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('languages.show', trans('dashboard/language.' . $language['name'])) }}
    @endsection

    <!--begin::Content container-->
    <div id="kt_app_content_container">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid">
                <!--begin::Card-->
                <div class="card card-flush mb-6 mb-xl-9">
                    <!--begin::Card body-->
                    <div class="card-body pb-0">
                        <div>
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative me-7">
                                    <img src="{{ asset('/storage/flags/' . $language['flag']) }}" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
                                        <h2 class="d-flex align-items-center">@lang('dashboard/language.' . $language['name'])</h2>

                                        <div class="d-flex">
                                            <a @if(!isLanguageActive($language['excerpt'])) href="{{ route('languages.switch', $language['excerpt']) }}" @endif class="btn btn-sm btn-primary me-3 @if(isLanguageActive($language['excerpt'])) btn-secondary @endif">{{ isLanguageActive($language['excerpt']) ? trans('dashboard/language.is_enabled') : trans('dashboard/language.enable')}}</a>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div>5600</div>
                                            <div class="fw-semibold fs-6 text-gray-500">همه متن ها</div>
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div>4500</div>
                                            <div class="fw-semibold fs-6 text-gray-500">ترجمه شده</div>
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div>1100</div>
                                            <div class="fw-semibold fs-6 text-gray-500">باقی مانده</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                @foreach($files as $file)
                                    <li class="nav-item mt-2">
                                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ $loop->index == 0 ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#{{ $file['name'] }}-tab-pane" type="button" role="tab" aria-controls="{{ $file['name'] }}-tab-pane" aria-selected="true">
                                            @lang('dashboard.' . \Illuminate\Support\Str::plural($file['name']))
                                        </a>
                                    </li>
                                @endforeach
                                <!--end::Nav item-->
                            </ul>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

                <!--begin::Card-->
                <div class="card card-flush">
                    <form action="{{ route('languages.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="excerpt" value="{{ $language['excerpt'] }}">
                        <div class="card-header">
                            <div class="card-title">
                                <button class="btn btn-primary" type="submit">ذخیره کردن</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                @foreach($files as $file)
                                    <div class="tab-pane fade {{ $loop->index == 0 ? 'active show' : '' }}" id="{{ $file['name'] }}-tab-pane" role="tabpanel" aria-labelledby="{{ $file['name'] }}-tab" tabindex="0">
                                        <div class="row">
                                            @foreach($file['contents'] as $key => $value)
                                                <div class="col-6 col-lg-3">
                                                    <label for="" class="form-label">@lang($file['langPrefix'] . $key)</label>
                                                    <input type="text" class="form-control" value="{{ $value }}" name="{{ $file['name'] }}[{{ $key }}]">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">ذخیره کردن</button>
                        </div>
                    </form>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Content container-->

</x-default-layout>
