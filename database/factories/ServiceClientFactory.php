<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ServiceClient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class ServiceClientFactory extends Factory
{
    protected $model = ServiceClient::class;

    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->unique()->words(nb: 5, asText: true),
            'slug' => Str::slug($name),
            'secret_key' => Str::random(),
        ];
    }
}
