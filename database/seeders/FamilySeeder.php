<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Family::truncate();

        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => '體育',
            ],
            [
                'name' => '區塊鏈',
            ]
        ];

        foreach ($data as $i) {
            Family::create($i);
        }
    }
}
