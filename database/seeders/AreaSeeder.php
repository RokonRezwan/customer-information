<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    public function run()
    {
        Area::create([
                'area_name' => 'Mirpur',
                'area_code' => '10',
            ]); 
        Area::create([
                'area_name' => 'Boshundhora',
                'area_code' => '20',
            ]); 
        Area::create([
                'area_name' => 'Mohammadpur',
                'area_code' => '30',
            ]); 
        Area::create([
                'area_name' => 'Uttora',
                'area_code' => '40',
            ]); 
        Area::create([
                'area_name' => 'Kuril',
                'area_code' => '50',
            ]); 
        Area::create([
                'area_name' => 'Kalshi',
                'area_code' => '60',
            ]); 
        Area::create([
                'area_name' => 'Motizhil',
                'area_code' => '70',
            ]); 
        Area::create([
                'area_name' => 'Dhanmondi',
                'area_code' => '80',
            ]); 
        Area::create([
                'area_name' => 'Shymoly',
                'area_code' => '90',
            ]); 
        Area::create([
                'area_name' => 'Shahabag',
                'area_code' => '95',
            ]); 
    }
}
