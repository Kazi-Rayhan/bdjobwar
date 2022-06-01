<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Choice;
use App\Models\Exam;
use App\Models\Package;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('packages')->truncate();
        DB::table('users')->truncate();
        DB::table('categories')->truncate();
        DB::table('subjects')->truncate();
        DB::table('user_metas')->truncate();
        DB::table('exams')->truncate();
        DB::table('questions')->truncate();
        DB::table('choices')->truncate();
        DB::table('categoriables')->truncate();
        DB::table('exam_question')->truncate();
        DB::table('subjectables')->truncate();

        Package::create([
            'title' => ' 1 Month',
            'duration' => 30,
            'price' => 200,
            'paid' => true,
            'infinite_duration' => 0,
        ]);
        Package::create([
            'title' => ' 3 Month',
            'duration' => 90,
            'price' => 500,
            'paid' => true,
            'infinite_duration' => 0,
        ]);
        Package::create([
            'title' => ' 6 Month',
            'duration' => 180,
            'price' => 800,
            'paid' => true,
            'infinite_duration' => 0,
        ]);
        Package::create([
            'title' => ' 12 Month',
            'duration' => 365,
            'price' => 1200,
            'paid' => true,
            'infinite_duration' => 0,
        ]);
        Package::create([
            'title' => 'Free',
            'duration' => null,
            'price' => 0,
            'paid' => false,
            'infinite_duration' => 1,
        ]);
   
        \App\Models\User::factory(100)->hasInformation(1)->create();
        Exam::factory(20)->hasCategories(5)->hasSubjects(5)->has(Question::factory(100)->hasChoices(4))->create();
        Question::all()->map(function($question){
            $index = 1;
           foreach($question->choices as $choice ){
               $choice->update(['index'=>$index]);
               $index ++;
           }
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
