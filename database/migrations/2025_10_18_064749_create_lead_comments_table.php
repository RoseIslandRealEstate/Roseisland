<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->foreign('lead_id')->references('id')
                        ->on('leads')->onDelete('cascade');
            $table->char('by',255);
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')
                        ->on('agents')->onDelete('cascade');
            $table->unsignedBigInteger('old_agent_id')->nullable();
            $table->foreign('old_agent_id')->references('id')
                        ->on('agents')->onDelete('cascade');
            $table->integer('status');
            $table->integer('old_status');
            $table->text('text')->nullable();
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
        Schema::dropIfExists('lead_comments');
    }
}
