<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('access_tokens', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('token')->unique();
            $table->text('scopes')->nullable();

            $table
                ->foreignUlid('user_identity_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_tokens');
    }
};
