<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\IdentityProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class IdentityProviderFactory extends Factory
{
    protected $model = IdentityProvider::class;

    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->randomElement([
                'Google', 'Facebook', 'Twitter', 'LinkedIn',
                'Treblle', 'GitHub', 'GitLab', 'Discord',
            ]),
            'slug' => Str::slug($name),
        ];
    }
}
