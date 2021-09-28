<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Track;
use App\Models\Photo;
use App\Models\Video;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       // $this->call([UsersTableSeeder::class]);




       $users= User::factory()->count(100)->create();
        Track::factory()->count(100)->create();
        Course::factory()->count(100)->create();
         Video::factory()->count(100)->create();
         Quiz::factory()->count(100)->create();
         Question::factory()->count(100)->create();
         Photo::factory()->count(100)->create();
         foreach($users as $user){
            $tracks_ids=[];
            $tracks_ids[]=Track::all()->random()->id;
            $tracks_ids[]=Track::all()->random()->id;
            $user->tracks()->sync($tracks_ids);
            $courses_ids=[];
            $courses_ids[]=Course::all()->random()->id;
            $courses_ids[]=Course::all()->random()->id;
            $user->courses()->sync($courses_ids);
            $quizzes_ids=[];
            $quizzes_ids[]=Quiz::all()->random()->id;
            $quizzes_ids[]=Quiz::all()->random()->id;
            $user->quizzes()->sync($quizzes_ids);
       }

    }
}
//in laravel 8 change
// factory(App\Models\Contact::class,100)->create();
//To
//\App\Models\Contact::factory()->create();
//\App\Models\Contact::factory(100)->create(); \\If you want to create 100 number of record then
