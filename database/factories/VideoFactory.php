<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\Video;

class VideoFactory extends Factory
{
    protected $model = Video::class;
    public function definition()
    {
        return [
            'title'=> $this->faker->word,
            'link'=>$this->faker->url,
            'course_id'=>Course::all()->random()->id,
        ];
    }
}
