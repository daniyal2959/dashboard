<x-default-layout>

    @section('title')
        @lang('dashboard.languages')
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('languages.index') }}
    @endsection

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <livewire:language.language-list></livewire:language.language-list>
    </div>
    <!--end::Content container-->

    <livewire:language.language-modal></livewire:language.language-modal>

</x-default-layout>
