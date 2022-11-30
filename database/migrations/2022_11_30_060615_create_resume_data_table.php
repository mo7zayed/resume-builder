<?php

use App\Models\Resume;
use App\Models\ResumeStep;
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
        Schema::create('resume_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resume::class);
            $table->foreignIdFor(ResumeStep::class);
            $table->jsonb('data');
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
        Schema::dropIfExists('resume_data');
    }
};
