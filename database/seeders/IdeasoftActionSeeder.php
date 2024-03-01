<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdeasoftActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getActions() as $action) {
            DB::table('ideasoft_actions')->insert($action);
        }
    }

    private function getActions()
    {
        return [
            [
                'name' => 'Ürün Güncelle',
                'identifier' => 'product_update',
                'fields' => json_encode([
                    'id',
                    'name',
                    'sku',
                    'stockAmount',
                    'price'
                ]),
                'cost' => 0.10
            ]
        ];
    }
}
