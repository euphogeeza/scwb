<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('composer_id')->unsigned();
            $table->unsignedBigInteger('arranger_id')->unsigned();
            $table->unsignedBigInteger('style_id')->unsigned();
            $table->string('soloist')->nullable();
            $table->boolean('in_pad')->default(0);
            $table->string('envelope')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('composer_id')->references('id')->on('composers');
            $table->foreign('arranger_id')->references('id')->on('composers');
            $table->foreign('style_id')->references('id')->on('styles');

        });

        /**
         * I need to think about creating the first two records that NEED to be in the music table.
         * 
         * id   title                               composer_id     arranger_id     style_id
         * 0    Select music title                  1               1               1
         * 1    -=-=-=-=-=- Interval -=-=-=-=-=-    1               1               1
         * 
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music');
    }
};
