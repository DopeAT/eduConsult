<?php

namespace App\Exports;

use App\Order;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromQuery, WithHeadings
{
    use Exportable;


    private $fields;
    private $dateFrom;
    private $dateTo;

    public function __construct($request)
    {
        $this->fields = $this->_setDBFields($request->fields);
        $this->dateFrom = $request->dateFrom;
        $this->dateTo   = $request->dateTo;
    }

    private function _setDBFields($db_fields)
    {
        $db_fields_array = [];

        if(in_array('payment_id', $db_fields)) { array_push($db_fields_array, 'orders.payment_id'); }
        if(in_array('full_name', $db_fields))  { array_push($db_fields_array, "CONCAT(users.firstname, ' ', users.lastname) As fullname"); }
        if(in_array('service', $db_fields))    { array_push($db_fields_array, 'services.name'); }
        if(in_array('product', $db_fields))    { array_push($db_fields_array, 'products.name'); }
        if(in_array('price', $db_fields))      { array_push($db_fields_array, 'payments.amount'); }
        if(in_array('created_at', $db_fields)) { array_push($db_fields_array, 'orders.created_at'); }

        return $db_fields_array;
    }

    public function query()
    {
        $min_date = !empty($this->dateFrom) ? \DateTime::createFromFormat('Y-m-d', $this->dateFrom) : false;
        $max_date = !empty($this->dateTo) ? \DateTime::createFromFormat('Y-m-d', $this->dateTo) : false;

        return Order::query()->selectRaw(implode(",",$this->fields))
                    ->when($min_date, function($query) use ($min_date, $max_date) {
                        if($min_date && $max_date) {
                            return $query->whereBetween('created_at', [$min_date->format('d M Y'), $max_date->format('d M Y')]);
                        }
                    })
                    ->join('users','orders.user_id','=','users.id')
                    ->join('services','orders.service_id','=','services.id')
                    ->join('products','orders.product_id','=','products.id')
                    ->join('payments','orders.payment_id','=','payments.payment_id');
    }

    public function headings(): array
    {
        return $this->fields;
    }
}
