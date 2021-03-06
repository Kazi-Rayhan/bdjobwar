<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'level'=>['easy','normal','hard'][rand(0,2)],
            'title'=>$this->faker->sentence(),
            'answer'=>rand(1,4),
            'has_description'=>false
        ];
    }
}
