<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select( 'category_id','supplier_id','product_code','product_name',
            'product_image','product_skew','product_garage',
            'product_route','production_date','expire_date',
            'buying_price','selling_price')->get();
    }
}
