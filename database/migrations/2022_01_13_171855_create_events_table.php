<?php
  
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
  
class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->bigInteger('userid')->unsigned()->nullable();
            $table->bigInteger('room')->unsigned();
            $table->timestamps();

            $table->foreign('room')->references('id')->on('rooms')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('userid')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

        });
    }  
  
    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}