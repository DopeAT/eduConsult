<?php

namespace App\Exports;

use App\Newsletter;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsletterExport implements FromQuery, WithHeadings
{

    use Exportable;

    private $dateFrom;
    private $dateTo;

    public function __construct($request)
    {
        $this->dateFrom = $request->dateFrom;
        $this->dateTo   = $request->dateTo;
    }

    public function query()
    {
        $min_date = !empty($this->dateFrom) ? \DateTime::createFromFormat('Y-m-d', $this->dateFrom) : false;
        $max_date = !empty($this->dateTo) ? \DateTime::createFromFormat('Y-m-d', $this->dateTo) : false;

        return Newsletter::query()->when($min_date, function($query) use ($min_date, $max_date) {
            if($min_date && $max_date) {
                return $query->whereBetween('created_at', [$min_date->format('d M Y'), $max_date->format('d M Y')]);
            }
        });
    }

    public function headings(): array
    {
        return ['email', 'date_created'];
    }
}
