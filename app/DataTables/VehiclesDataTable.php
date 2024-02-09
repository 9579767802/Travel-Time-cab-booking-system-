<?php

namespace App\DataTables;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VehiclesDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {

                return '<a href="' . route('vehicles.edit', $query->id) . '" class="btn btn-sm btn-primary edit-btn" data-id="' . $query->id . '">Edit</a>
            <a href="' . route('vehicles.delete', $query->id) . '" class="btn btn-sm btn-danger edit-btn" data-id="' . $query->id . '">Delete</a>';

            })

            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" border="1" width="100"height="40" class="img-rounded" align="center" />';
            })

            ->rawColumns(['image', 'action'])
            ->setRowId('id');
    }
    public function query(Vehicle $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vehicles-table')
            ->columns($this->getColumns())
            ->minifiedAjax()

            ->orderBy(1)

            ->buttons([

            ]);
    }

    public function getColumns(): array
    {
        return [

            // Column::make('id'),
            Column::make('id'),
            Column::make('model_name'),
            Column::make('vehicle_no'),
            Column::make('passenger_capacity'),
            Column::make('image'),
            Column::make('action'),
        ];
    }
    protected function filename(): string
    {
        return 'Vehicles_' . date('YmdHis');
    }
}
