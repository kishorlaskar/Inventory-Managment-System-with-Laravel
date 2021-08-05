<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id'=>$row[0],
            'supplier_id'=>$row[1],
            'product_code'=>$row[2],
            'product_name'=>$row[3],
            'product_image'=>$row[4],
            'product_skew'=>$row[5],
            'product_garage'=>$row[6],
            'product_route'=>$row[7],
            'production_date'=>$row[8],
            'expire_date'=>$row[9],
            'buying_price'=>$row[10],
            'selling_price'=>$row[11]

        ]);
    }
}
