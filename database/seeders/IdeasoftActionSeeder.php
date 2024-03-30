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
                    [
                        "id" => "id",
                        "type" => "input",
                        "name" => "Ürün Id",
                        "required" => true
                    ],
                    [
                        "id" => "name",
                        "type" => "input",
                        "name" => "Ürün Adı",
                        "required" => false
                    ],
                    [
                        "id" => "sku",
                        "type" => "input",
                        "name" => "Ürün Stok Kodu",
                        "required" => false
                    ],
                    [
                        "id" => "stockAmount",
                        "type" => "input",
                        "name" => "Ürün Stok Sayısı",
                        "required" => false

                    ], [
                        "id" => "price1",
                        "type" => "input",
                        "name" => "Ürün Fiyat 1",
                        "required" => false

                    ]
                ], JSON_THROW_ON_ERROR),
                'cost' => 0.10
            ]
        ];
    }
}
