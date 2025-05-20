<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BankInst;
use Illuminate\Database\Seeder;

class BankInstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            [
                'name' => 'Banco do Brasil',
                'code' => '001',
                'imagem_path' => 'upload/banco_do_brasil.png'
            ]
        ];

        foreach ($banks as $bank) {
            BankInst::create($bank);
        }
    }
}
