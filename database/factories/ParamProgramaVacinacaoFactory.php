<?php

namespace Database\Factories;

use App\Models\ParamProgramaVacinacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParamProgramaVacinacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ParamProgramaVacinacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->sentence(3),
        ];
    }
}

