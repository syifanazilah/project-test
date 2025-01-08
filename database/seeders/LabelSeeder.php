<?php

namespace Database\Seeders;
use App\Models\Labels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Labels::create(['name' => 'Bug']);
        Labels::create(['name' => 'Question']);
        Labels::create(['name' => 'Enhancement']);
    }
}
