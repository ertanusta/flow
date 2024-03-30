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
                    [
                        "identifier" => "trigger.id",
                        "name" => "Ürün Id"
                    ],
                    [
                        "identifier" => "trigger.name",
                        "name" => "Ürün Adı"
                    ],
                    [
                        "identifier" => "trigger.price1",
                        "name" => "Ürün Fiyat 1"
                    ],
                    [
                        "identifier" => "trigger.stockAmount",
                        "name" => "Ürün Stok Sayısı"
                    ]
                ], JSON_THROW_ON_ERROR),
                'is_reader' => false
            ]
        ];
    }
}
