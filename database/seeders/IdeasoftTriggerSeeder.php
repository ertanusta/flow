<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdeasoftTriggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getTriggers() as $trigger) {
            DB::table('ideasoft_triggers')->insert($trigger);
        }
    }

    private function getTriggers()
    {
        return [
            [
                'Ürün Güncelleme',
                'product_update',
                'fields' => json_encode([
                    'id',
                    'name',
                    'sku',
                    'stockAmount',
                    'price'
                ]),
                'is_reader' => false
            ]
        ];
    }
}
