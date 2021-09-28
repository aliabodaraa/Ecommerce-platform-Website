<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Track;
class TrackFactory extends Factory
{
    protected $model = Track::class;

    public function definition()
    {
        return [

            'name'=> $this->faker->name,
        ];
    }

}
