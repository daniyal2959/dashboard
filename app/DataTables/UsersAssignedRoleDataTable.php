<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UsersAssingedRole;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersAssignedRoleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['user'])
            ->editColumn('user', function (User $user) {
                return view('pages.apps.management.roles.columns._user', compact('user'));
            })
            ->editColumn('created_at', function (User $user) {
                if( isPersian() )
                    return Jalalian::fromCarbon(Carbon::createFromTimeString($user->created_at))->format('Y/m/d');
                else
                    return Carbon::parse($user->created_at)->translatedFormat('Y/m/d');
            })
            ->addColumn('action', function (User $user) {
                return view('pages.apps.management.roles.columns._actions', compact('user'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->whereHas('roles', function (Builder $query) {
            $query->where('role_id', $this->role->getKey());
        });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('usersassingedrole-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(1)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/management/users/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title(trans('dashboard/user.id'))->addClass('text-start'),
            Column::make('user')->title(trans('dashboard/user.user'))->addClass('d-flex align-items-center text-start')->name('name'),
            Column::make('name')->title(trans('dashboard/user.name'))->addClass('text-start'),
            Column::make('created_at')->title(trans('dashboard/user.created_at'))->addClass('text-nowrap text-start'),
            Column::computed('action')
                ->title(trans('dashboard/user.actions'))
                ->addClass('text-start text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UsersAssingedRole_' . date('YmdHis');
    }
}
