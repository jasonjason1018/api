<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTodolistTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolist_task', function (Blueprint $table) {
            $table->id('id_todolist_task');
            $table->string('text');
            $table->tinyInteger('is_completed')
                ->default(0)
                ->comment('0 - not done, 1 - done');
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
        Schema::dropIfExists('todolist_task');
    }
}
