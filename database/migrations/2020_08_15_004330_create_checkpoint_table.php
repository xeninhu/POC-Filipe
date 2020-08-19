<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckpointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('checkpoints');
        Schema::create('checkpoints', function (Blueprint $table) {
            $table->id();
            $table->string("subcat");
            $table->string("checkpoint");
            $table->string("code")->nullable();
            $table->text("comment")->nullable();
            $table->unsignedBigInteger("site_id");
            
            //$table->index(['site_id']);
            $table->foreign('site_id')
                    ->references('id')
                    ->on('sites')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('checkpoints');
    }
}
