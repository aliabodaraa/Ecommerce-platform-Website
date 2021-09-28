<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\Quiz;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;
    public function definition()
    {
        return [
            'name'=> $this->faker->word,
            'course_id'=>Course::all()->random()->id,
        ];
    }
}
