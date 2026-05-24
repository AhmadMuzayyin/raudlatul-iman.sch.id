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
        Schema::table('post_views', function (Blueprint $table) {
            $table->string('visitor_key', 64)->nullable()->after('post_id');
            $table->dropUnique(['ip_address']);
            $table->unique(['post_id', 'visitor_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_views', function (Blueprint $table) {
            $table->dropUnique(['post_id', 'visitor_key']);
            $table->unique('ip_address');
            $table->dropColumn('visitor_key');
        });
    }
};
