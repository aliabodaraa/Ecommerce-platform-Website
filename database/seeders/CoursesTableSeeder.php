<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Track;use App\Models\Course;
class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        Course::factory()->count(100)->create();
    }
}
