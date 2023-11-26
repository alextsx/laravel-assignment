<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('search_histories', function (Blueprint $table) {
            //need this to enable foreign keys in sqlite
            DB::statement('PRAGMA foreign_keys=on;');
            //$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //* Just practising the long way of doing it, no other reason
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_histories', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};
