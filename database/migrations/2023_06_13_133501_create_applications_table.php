<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('butterfly_id');
            $table->string('address', 1000);
            $table->string('mode_of_transport', 1000);
            $table->date('date_of_transport', 1000);
            $table->string('purpose', 5000);
            $table->string('details', 5000);
            $table->enum('status', ['approved', 'pending', 'declined']);
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
        Schema::dropIfExists('applications');
    }
}
