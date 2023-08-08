<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AccessToken;
use App\Models\UserIdentity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class AccessTokenFactory extends Factory
{
    protected $model = AccessToken::class;

    public function definition(): array
    {
        return [
            'token' => Str::random(),
            'scopes' => null,
            'expires_at' => now()->addDays(15),
            'user_identity_id' => UserIdentity::factory(),
        ];
    }
}
