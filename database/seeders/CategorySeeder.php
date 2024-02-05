<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'comic',
            'novel',
            'fantasy',
            'fiction',
            'mistery',
            'horror',
            'romace',
            'western'
        ];

        foreach($data as $value) {
            Category::insert([
                'name' => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
