<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branchNames = ['branch1', 'branch2', 'branch3', 'branch4', 'branch5'];

        // Create branches
        foreach ($branchNames as $name) {
            Branch::create(['name' => $name]);
        }
    }
}
