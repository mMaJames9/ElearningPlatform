<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use LucasDotVin\Soulbscription\Models\Plan;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plan::class);
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('expired_at')->default(null);
            $table->timestamp('grace_days_ended_at')->nullable();
            $table->date('started_at');
            $table->timestamp('suppressed_at')->nullable();
            $table->boolean('was_switched')->default(false);
            $table->softDeletes();
            $table->timestamps();

            if (config('soulbscription.models.subscriber.uses_uuid')) {
                $table->uuidMorphs('subscriber');
            } else {
                $table->numericMorphs('subscriber');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
