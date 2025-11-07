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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // bigint unsigned + primary key

            // 外部キー
            $table->foreignId('category_id')
                ->constrained('categories') // categoriesテーブルのidを参照
                 ->cascadeOnDelete(); // 親削除時に子も削除（任意）

            //$table->foreignId('user_id')
               // ->constrained('users')
                //->cascadeOnDelete();

            // 基本情報
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->tinyInteger('gender'); // 1:男性, 2:女性, 3:その他

            $table->string('email', 255);
            $table->string('tel', 255);
            $table->string('address', 255);
            $table->string('building', 255)->nullable(); 
            $table->text('detail');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts',function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
    });
}
};