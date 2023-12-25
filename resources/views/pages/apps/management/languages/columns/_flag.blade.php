<div class="d-flex align-items-center">
    <!--begin:: Avatar -->
    <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
        <a href="{{ route('languages.show', $language['regional']) }}">
{{--            @if($language->flag)--}}
{{--                <div class="symbol-label">--}}
{{--                    <img src="{{ asset('/storage/flags/' . $language->flag) }}" class="w-100"/>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $language->flag) }}">--}}
{{--                    {{ substr($language->flag, 0, 1) }}--}}
{{--                </div>--}}
{{--            @endif--}}
        </a>
    </div>
    <!--end::Avatar-->
    <!--begin::User details-->
    <div class="d-flex flex-column">
        <a href="{{ route('languages.show', $language['regional']) }}" class="text-gray-800 text-hover-primary">
            @lang('dashboard/language.' . $language['name'])
        </a>
    </div>
    <!--begin::User details-->

</div>
