<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getApplications() as $app) {
            DB::table('applications')->insert($app);
        }
    }

    private function getApplications()
    {
        return [
           [
               'identifier' => 'ideasoft',
               'name' => 'IdeaSoft',
           ]
        ];
    }
}
