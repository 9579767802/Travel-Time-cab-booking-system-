<?php

namespace App\DataTables;

use App\Models\driver;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class driversDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('action', function ($query) {
                return '<div class="d-flex"><a href="' . route('drivers.edit', $query->id) . '" class="btn me-2 btn-sm btn-primary edit-btn" data-id="' . $query->id . '">Edit</a>
            <a href="' . route('drivers.delete', $query->id) . '" class="btn btn-sm btn-danger delete-btn" data-id="' . $query->id . '">Delete</a></div>';
            })

            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(driver $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('drivers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()

            ->orderBy(1)

            ->buttons([

            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('license_no'),
            Column::make('aadhar_no'),
            Column::make('address'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),

        ];
    }

    protected function filename(): string
    {
        return 'drivers_' . date('YmdHis');
    }
}
