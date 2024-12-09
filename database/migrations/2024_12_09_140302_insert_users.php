<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        {
            DB::table('users')->insert([
                [
                    'name' => 'Tarcísio Silva',
                    'cpf' => '11975213720',
                    'email' => "tarcisio1@gmail.com.br",
                    'password' => '$2y$12$NRJ3bXyVjFdbr4ZfJKcn5OSy2hcTrUsjBZf2WEHJPUD9w5uTT3BCK', //21345090
                    'position' => 1,
                    'cep' => "21345090",
                    'dob' => "18-04-1988",
                    'address' => "Rua Frederico Maurer,982",
                    'complements' => "Casa 13",
                    'city' => "Curitiba",
                    'state' => "PR",
                    'country' => "Brasil",
                    'phone' => "999999999",
                    'supervisor_id' => 1
                    
                ],
                [
                    'name' => 'Tarcísio Silva',
                    'cpf' => '11975213721',
                    'email' => "tarcisio2@gmail.com.br",
                    'password' => '$2y$12$NRJ3bXyVjFdbr4ZfJKcn5OSy2hcTrUsjBZf2WEHJPUD9w5uTT3BCK', //21345090
                    'position' => 3,
                    'cep' => "21345090",
                    'dob' => "18-04-1988",
                    'address' => "Rua Frederico Maurer,982",
                    'complements' => "Casa 13",
                    'city' => "Curitiba",
                    'state' => "PR",
                    'country' => "Brasil",
                    'phone' => "999999999",
                    'supervisor_id' => 1
                    
                ],
                [
                    'name' => 'Tarcísio Silva',
                    'cpf' => '11975213722',
                    'email' => "tarcisio3@gmail.com",
                    'password' => '$2y$12$NRJ3bXyVjFdbr4ZfJKcn5OSy2hcTrUsjBZf2WEHJPUD9w5uTT3BCK', //21345090
                    'position' => 3,
                    'cep' => "21345090",
                    'dob' => "18-04-1988",
                    'address' => "Rua Frederico Maurer,982",
                    'complements' => "Casa 13",
                    'city' => "Curitiba",
                    'state' => "PR",
                    'country' => "Brasil",
                    'phone' => "999999999",
                    'supervisor_id' => 1
                    
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->delete();
    }
};




