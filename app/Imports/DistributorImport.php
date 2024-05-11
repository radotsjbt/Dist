<?php

namespace App\Imports;

use App\Models\Distributor;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DistributorImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info($row);

        return new Distributor([
            'cust_id' => $row['cust_id'],
            'cust_name' => $row['cust_name'] ?? $row['cust_id'],
            'cust_address' => $row['cust_address'],
            'cust_phone' => $row['cust_phone'],
            'cust_email' => $row['cust_email'],
            'fax' => $row['fax'],
            'website' => trim($row['website']),
            'company_image' => $row['company_image'],
            'purchase_needs' => $row['purchase_needs'],
            'qty_pr_needs' => $row['qty_pr_needs'],
            'price' => $row['price_kgbutir'],
            'buy_price' => $row['buy_price'],
            'custprod_name' => $row['custprod_name'],
            'custprod_desc' => $row['custprod_desc'],
            'custprod_image' => $row['custprod_image'],
        ]);
    }
}
