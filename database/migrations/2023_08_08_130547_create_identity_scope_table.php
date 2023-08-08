<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('identity_scope', static function (Blueprint $table): void {
            $table
                ->foreignUlid('user_identity_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUlid('scope_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->primary(['user_identity_id','scope_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('identity_scope');
    }
};
