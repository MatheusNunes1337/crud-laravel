<?php

use App\Models\Usuario;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario' => $this->faker->word(),
            'email' => $this->faker->email(),
            'senha' => $this->faker->word()
        ];
    }
}
