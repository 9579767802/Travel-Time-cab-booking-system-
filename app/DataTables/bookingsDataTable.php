<?php

namespace App\DataTables;

use App\Models\booking;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
;
use Yajra\DataTables\Services\DataTable;

class bookingsDataTable extends DataTable
{
 
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        
             return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '
                <a href="'.route('bookings.delete', $query->id). '" class="btn btn-sm btn-danger delete-btn" data-id="' . $query->id . '">Delete</a></div>';
            })
            ->editColumn('user_name',function($row){
                return $row->user->name;
            })
            ->editColumn('model_name',function($row){
                return $row->vehicle->model_name;
            })
            ->editColumn('passenger_capacity',function($row){
                return $row->vehicle->passenger_capacity;    
            })
            ->editColumn('vehicle_no',function($row){
                return $row->vehicle->vehicle_no; 
            })
            ->editColumn('image',function($row){
                // return; 
                return '<img src="' . asset($row->vehicle->image) . '" border="1" width="100"height="40" class="img-rounded" align="center" />';

            })
            ->editColumn('driver_name',function($row){
                return $row->driver->name;
            })
            
            ->rawColumns(['user_name', 'driver_name','image','action'])
        
            ->setRowId('id');
    }

    public function query(booking $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bookings-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    // ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }
    public function getColumns(): array
    {
        return [
            Column::make('user_name'),
            Column::make('from_location'),
            Column::make('to_location'),
            Column::make('from_date'),
            Column::make('to_date'),
            Column::computed('model_name'),
             Column::computed('passenger_capacity'),
            Column::computed('vehicle_no'),
            Column::make('driver_name'),
            Column::computed('image'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }
    protected function filename(): string
    {
        return 'bookings_' . date('YmdHis');
    }
}
