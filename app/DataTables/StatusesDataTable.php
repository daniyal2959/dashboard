<?php

namespace App\DataTables;

use App\Models\Status;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StatusesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('back_color', function (Status $status) {
                return "<div class='w-25px h-25px rounded-circle' style='background-color: ".$status->back_color."'></div>";
            })
            ->editColumn('text_color', function (Status $status) {
                return "<div class='w-25px h-25px rounded-circle' style='background-color: ".$status->text_color."'></div>";
            })
            ->editColumn('result', function (Status $status) {
                return "<div class='py-1 px-2 rounded text-center' style='background-color: ".$status->back_color."'><small style='color: ".$status->text_color."'>".$status->name."</small></div>";
            })
            ->editColumn('created_at', function (Status $status) {
                if( isPersian() )
                    return Jalalian::fromCarbon(Carbon::createFromTimeString($status->created_at))->format('Y/m/d');
                else
                    return Carbon::parse($status->created_at)->translatedFormat('Y/m/d');
            })
            ->addColumn('actions', function (Status $status) {
                return view('pages.apps.management.statuses.columns._actions', compact('status'));
            })
            ->setRowId('id')
            ->rawColumns(['back_color', 'text_color', 'result']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Status $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('statuses-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(0)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//apps/management/statuses/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title(trans('dashboard/status.id'))->addClass('text-start'),
            Column::make('name')->title(trans('dashboard/status.name'))->addClass('text-start'),
            Column::make('back_color')->title(trans('dashboard/status.back_color'))->addClass('text-start'),
            Column::make('text_color')->title(trans('dashboard/status.text_color'))->addClass('text-start'),
            Column::make('result')->title(trans('dashboard/status.result'))->addClass('text-start'),
            Column::make('created_at')->title(trans('dashboard/status.created_at'))->addClass('text-start'),
            Column::computed('actions')
                ->title(trans('dashboard/status.actions'))
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Statuses_' . date('YmdHis');
    }
}
