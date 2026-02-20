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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('site_name')->nullable()->after('content');
            $table->text('description')->nullable()->after('site_name');
            $table->text('address')->nullable()->after('description');
            $table->string('map_link')->nullable()->after('address');
            $table->string('complaint_link')->nullable()->after('map_link');
            $table->string('phone')->nullable()->after('complaint_link');
            $table->string('fax')->nullable()->after('phone');
            $table->string('email')->nullable()->after('fax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'site_name',
                'description',
                'address',
                'map_link',
                'complaint_link',
                'phone',
                'fax',
                'email',
            ]);
        });
    }
};
