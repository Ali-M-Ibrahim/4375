<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new Status();
        $obj->name="Available";
        $obj->save();

        $obj2 = new Status();
        $obj2->name="Rented";
        $obj2->save();

    }
}
