<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PermissionsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('name', function (Permission $permission) {
                return trans('dashboard/permission.' . $permission->name);
            })
            ->addColumn('assigned_to', function (Permission $permission) {
                $roles = $permission->roles;
                return view('pages.apps.management.permissions.columns._assign-to', compact('roles'));
            })
            ->editColumn('created_at', function (Permission $permission) {
                if( isPersian() )
                    return Jalalian::fromCarbon(Carbon::createFromTimeString($permission->created_at))->format('Y/m/d');
                else
                    return Carbon::parse($permission->created_at)->translatedFormat('Y/m/d');
            })
            ->addColumn('actions', function (Permission $permission) {
                return view('pages.apps.management.permissions.columns._actions', compact('permission'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Permission $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('permissions-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(0)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//apps/management/permissions/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')->title(trans('dashboard/permission.name'))->addClass('text-start'),
            Column::make('assigned_to')->title(trans('dashboard/permission.assigned_to'))->addClass('text-start'),
            Column::make('created_at')->title(trans('dashboard/permission.created_at'))->addClass('text-nowrap text-start'),
            Column::computed('actions')
                ->title(trans('dashboard/permission.actions'))
                ->addClass('text-start text-nowrap')
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Permissions_' . date('YmdHis');
    }
}
