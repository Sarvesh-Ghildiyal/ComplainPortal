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
        Schema::create('complains', function (Blueprint $table) {
            $table->id();

            //Submitting complain
            $table->unsignedBigInteger('user_id');
            $table->string('department');
            $table->unsignedBigInteger('room_no');
            $table->string('reported_by');
            $table->string('requested_by');
            $table->string('description');

            //Feedback
            $table->string('comp_feedback')->nullable();
            $table->string('comp_comment')->nullable();
            
            //Assignee form
            $table->string('asignee_comment')->nullable();
            $table->date('date_of_completion')->nullable();
            

            //Admin action for complain
                //assinging complain
            $table->string('assigned_to')->nullable();
            $table->string('admin_remarks')->nullable();
                //closing complain
            $table->string('admin_comment')->nullable();

            //complain status, not closed is 0
            $table->boolean('complain_status')->default(0);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
