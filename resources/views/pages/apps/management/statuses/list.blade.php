<x-default-layout>

    @section('title')
        @lang('dashboard.statuses')
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('statuses.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier','fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-status-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="@lang('dashboard/status.search_status')" id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-status-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_status">
                        {!! getIcon('plus-square','fs-3', '', 'i') !!}
                        @lang('dashboard/status.add_status')
                    </button>
                </div>
                <!--end::Toolbar-->

                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-status-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-status-table-select="selected_count"></span>
                        @lang('dashboard/status.selected')
                    </div>

                    <button type="button" class="btn btn-danger" data-kt-status-table-select="delete_selected">
                        @lang('dashboard/status.delete_selected')
                    </button>
                </div>
                <!--end::Group actions-->

                <!--begin::Modal-->
                <livewire:user.add-user-modal></livewire:user.add-user-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    <livewire:status.status-modal></livewire:status.status-modal>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['statuses-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:load', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_update_status').modal('hide');
                    window.LaravelDataTables['statuses-table'].ajax.reload();
                });
            });
        </script>
    @endpush

</x-default-layout>
