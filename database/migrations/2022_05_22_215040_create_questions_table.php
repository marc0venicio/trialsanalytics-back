<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lcobucci\JWT\Validation\Constraint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained();
            $table->string("description");
            $table->json("alternatives");
            $table->enum("answer", ["a", "b", "c", "d", "e"]);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('proof_question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('proof_id')->constrained('proofs');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_proof');
        Schema::dropIfExists('questions');
    }
};
