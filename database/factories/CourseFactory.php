<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  $title=$this->faker->paragraph(1);
        return [
            'title'=>$title ,
            'description'=> $this->faker->paragraph(1),
            'slug'=>strtolower(str_replace(' ','-',$title)),
            'status'=> $this->faker->randomElement([0,1]),
            'link'=>$this->faker->url,
            'track_id'=>Track::all()->random()->id,
        ];
    }
}
