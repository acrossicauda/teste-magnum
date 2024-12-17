<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculoInfluencersCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculo_influencers_campanhas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("influencer_id")->unsigned();
            $table->unsignedBigInteger("campanha_id")->unsigned();

            $table->foreign("influencer_id")->references("id")->on("influencers")->onDelete("cascade");
            $table->foreign("campanha_id")->references("id")->on("campanhas")->onDelete("cascade");

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
        Schema::dropIfExists('vinculo_influencers_campanhas');
    }
}
