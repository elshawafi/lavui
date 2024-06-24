<?php

use App\Enums\Banner;
use App\Enums\Position;
use App\Enums\Status;
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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->json('image')->nullable();
            $table->json('text')->nullable();
            $table->unsignedTinyInteger('position')->default(Position::GENERAL);
            $table->unsignedTinyInteger('z_index')->nullable();
            $table->unsignedTinyInteger('type')->default(Banner::FIXED)->nullable();
            $table->unsignedTinyInteger('status')->default(Status::ACTIVE);
            $table->string('creator_type',)->nullable();
            $table->bigInteger('creator_id',)->nullable();
            $table->string('editor_type',)->nullable();
            $table->bigInteger('editor_id',)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
