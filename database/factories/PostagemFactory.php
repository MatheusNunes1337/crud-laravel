<?php

use App\Models\Postagem;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostagemFactory extends Factory
{
    protected $model = Postagem::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'conteudo' => $this->faker->paragraph(4),
        ];
    }
}
