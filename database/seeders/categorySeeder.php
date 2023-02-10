<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            ['name' => 'Elektronik'],
            ['name' => 'Fashion'],
            ['name' => 'Kesehatan & Kebersihan'],
            ['name' => 'Furnitur & Rumah Tangga'],
            ['name' => 'Otomotif'],
            ['name' => 'Mainan & Hobi'],
            ['name' => 'Buku & Kantor'],
            ['name' => 'Makanan & Minuman'],
            ['name' => 'Musik & Film'],
            ['name' => 'Kado & Hadiah']
        ];

        foreach ($data as $value){
            Category::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

    }
}
