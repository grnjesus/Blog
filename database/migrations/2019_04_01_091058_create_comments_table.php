<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			             
			$table->bigInteger('user_id')  // Атрибут manufacturer_id
			->unsigned();                 // беззнакового целого типа             
			$table->foreign('user_id')  // Создание внешнего ключа,                   
			->references('id')            // ссылающегося на атрибут id                   
			->on('users')         // в таблице manufacturers,                   
			->onDelete('CASCADE')         // разрешающего удалять производителя  вместе с сопоставленными продуктам                  
			->onUpdate('RESTRICT')        // и запрещающим изменение id  в manufacturers             
			;
			$table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
