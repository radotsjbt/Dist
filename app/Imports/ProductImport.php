<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker\Factory as Faker;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $faker = Faker::create();
        // Log::info($row);
        return new Product([
            'farmer_id' => $row['farmer_id'],
            'farmer_name' => $row['farmer_name'],
            'farmer_address' => $row['farmer_address'],
            'farmer_phone' => $row['farmer_phone'] ?? $faker->phoneNumber,
            'farmer_email' => $row['farmer_email'] ?? $faker->email,
            'land_area' => $row['land_area'] ?? $faker->numberBetween(100, 10000),
            'harv_id' =>$row['harv_id'],
            'harv_name' => $row['harv_name'],
            'harv_desc' =>$row['harv_desc'] ?? $row['harv_name'],
            'harv_type' => $row['harv_type'],
            'harv_stock' => $row['harv_stock_kg'],
            'harv_price' => $row['harv_pricekg'],
            'image_harv' => $row['image_harv'] ?? $faker->imageUrl($width = 640, $height = 480),
        ]);
    }
}
