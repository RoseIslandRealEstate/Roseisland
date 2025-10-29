<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->char('SNO',255)->nullable();
            $table->date('date')->nullable();
            $table->char('name',255);
            $table->char('phone',255);
            $table->char('type',255)->nullable()->default('Rent');
            $table->text('inquiry')->nullable();
            $table->char('project_name')->nullable();
            $table->integer('platform')->nullable()->default();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')
                        ->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')
                        ->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('leads');
    }
}
