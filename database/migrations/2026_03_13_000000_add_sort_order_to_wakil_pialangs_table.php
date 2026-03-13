<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('wakil_pialangs', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('category_id');
        });

        // Inisialisasi nilai sort_order sesuai urutan saat ini (berdasarkan ID)
        $rows = DB::table('wakil_pialangs')->orderBy('id')->get(['id']);
        foreach ($rows as $index => $row) {
            DB::table('wakil_pialangs')
                ->where('id', $row->id)
                ->update(['sort_order' => $index + 1]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wakil_pialangs', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};
