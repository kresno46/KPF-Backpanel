<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kariers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kota');
            $table->string('posisi');
            $table->string('slug')->unique();
            $table->longText('responsibilities')->nullable();
            $table->longText('qualifications')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        // Insert contoh data
        DB::table('kariers')->insert([
            [
                'id' => 9,
                'nama_kota' => 'Bandung',
                'posisi' => 'Website Developer',
                'slug' => 'bandung-website-developer',
                'responsibilities' => '<ul><li>Work with multiple departments...</li></ul>',
                'qualifications' => '<ul><li>Bachelor degree in Mathematics...</li></ul>',
                'email' => 'rancagp19@gmail.com',
                'created_at' => '2025-10-22 13:23:56',
                'updated_at' => '2025-10-22 13:23:56'
            ],
            [
                'id' => 10,
                'nama_kota' => 'Semarang',
                'posisi' => 'IT Support',
                'slug' => 'semarang-it-support',
                'responsibilities' => '<ul><li>Work with multiple departments...</li></ul>',
                'qualifications' => '<ul><li>Bachelor degree in Mathematics...</li></ul>',
                'email' => 'ranga632@gmail.com',
                'created_at' => '2025-10-22 13:25:43',
                'updated_at' => '2025-10-22 13:46:15'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kariers');
    }
};
