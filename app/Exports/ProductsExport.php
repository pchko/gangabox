<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select(['collection','productCode', 'productOrder'])->get();
    }

    public function headings(): array{
        return [
            'CATEGORY',
            'PRODUCT ID',
            'PRODUCT ORDER',
        ];
    }
}
