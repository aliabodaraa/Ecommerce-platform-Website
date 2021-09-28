<?php

namespace Database\Factories;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\User;

class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition()
    {
     $course_id=Course::all()->random()->id;
     $user_id=User::all()->random()->id;
     $photoable_id=$this->faker->randomElement([$course_id,$user_id]);
     $photoable_type= ( $photoable_id== $user_id)?'App\Models\User':'App\Models\Course';
        return [
            'filename' => $this->faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg','11.jpg','12.jpg']),
            'photoable_id'=> $photoable_id,
            'photoable_type'=> $photoable_type,
            // 'url_image'  => $this->faker->image('public/storage/posts', 650, 490, null, false)
        ];
    }

}
