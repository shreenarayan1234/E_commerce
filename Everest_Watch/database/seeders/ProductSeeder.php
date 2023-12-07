<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name'=> 'Rado',
            'price' => 3000,
            'quantity' => 5,
            'gallery' => 'https://www.google.com/search?client=ubuntu-sn&hs=w7w&sca_esv=588723058&channel=fs&sxsrf=AM9HkKmWecnPLMnHguE4Kia2M2Y_TdcBsA:1701951895103&q=watch&tbm=isch&source=lnms&sa=X&ved=2ahUKEwj2gIfxqP2CAxWkxzgGHQv4DloQ0pQJegQIDRAB&biw=1366&bih=612#imgrc=XbTuaafr9-vi3M',
            'description' => 'this is my watch'
        ]);
        
    }
}
