<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Scope;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class ScopeFactory extends Factory
{
    protected $model = Scope::class;

    public function definition(): array
    {
        $actions = ['created','read','update','delete'];
        $services = [$this->faker->word(),$this->faker->word(),$this->faker->word(),$this->faker->word()];

        return [
            'name' => $name = $this->faker->randomElement($services) . ' ' . $this->faker->randomElement($actions),
            'slug' => Str::slug($name),
            'description' => $this->faker->realText(),
        ];
    }
}
