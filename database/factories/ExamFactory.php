<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'uuid' => 'EXM'.now()->format('Y').rand(9999,99999),
           'title'=> 'Exam '.$this->faker->sentence(),
           'sub_title' => 'Exam '.$this->faker->sentence().' '.now()->format('Y'),
           'is_paid'=>true,
           'price'=>rand(100,200),
           'from'=>now()->addDays(rand(0,3)),
           'to'=>now()->addDays(rand(3,10)),
           'duration'=>120,
           'point'=>1,
           'minimum_to_pass'=>rand(0,33),
           'minius_mark'=>1
        ];
    }
}
