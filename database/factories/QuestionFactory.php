<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;
use App\Models\Question;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {   $answer= $this->faker->paragraph(1);
        $right_answer=$this->faker->randomElement(explode(' ',$answer));
        return [
            'title'=> $this->faker->word,
            'answer'=> $answer,
            'right_answer'=> $right_answer,
            'score' => $this->faker->randomElement([10,12,13,17,18,23,45]),
            'type' => $this->faker->randomElement(['checkbox','text']),
            'quiz_id'=>Quiz::all()->random()->id,
        ];
    }

}
