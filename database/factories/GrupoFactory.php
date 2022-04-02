<?php

use App\Models\Grupo;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoFactory extends Factory
{

    protected $model = Grupo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'disciplina' => $this->faker->word(),
        ];
    }
}
