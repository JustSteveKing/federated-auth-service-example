<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\IdentityProvider;
use App\Models\User;
use App\Models\UserIdentity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class UserIdentityFactory extends Factory
{
    protected $model = UserIdentity::class;

    public function definition(): array
    {
        return [
            'provider_unique_id' => $this->faker->uuid(),
            'token' => Str::random(),
            'user_id' => User::factory(),
            'identity_provider_id' => IdentityProvider::factory(),
        ];
    }
}
