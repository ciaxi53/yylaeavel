<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        
        $brand = Brand::where('name', 'Default Brand')->first();

        if (!$brand) {
            Brand::create([
                'name' => 'Default Brand',
                'category' => 'Electronics',
                'supplier' => 'Supplier XYZ',
                'stock' => 100,
                'price' => 500.00,
                'note' => 'This is a default brand created by the seeder.',
            ]);
        } else {
            echo "Default Brand already exists.\n";
        }
    }
}
