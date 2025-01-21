<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\{
    BatchResource,
    CategoryResource,
    CourseResource,
    ExamResource,
    QuestionResource
};
use App\Models\{
    Batch,
    Course,
    Exam,
    Question
};
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Fetch a paginated list of batches with active status 0.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function batches()
    {
        $batches = Batch::with('course')->latest()->where('active', 1)->paginate(50);
        return BatchResource::collection($batches);
    }

    /**
     * Fetch all courses.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function courses()
    {
        $courses = Course::with('batches')->latest()->paginate(50);
        return CourseResource::collection($courses);
    }

    /**
     * Fetch a paginated list of active exams.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function exams()
    {
        $exams = Exam::where('active', 1)->paginate(10);
        return ExamResource::collection($exams);
    }

    /**
     * Fetch a paginated list of categories with parent and children relationships.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function categories()
    {
        $categories = Category::latest()->with(['parent', 'childrens'])->paginate(50);
        return CategoryResource::collection($categories);
    }

    /**
     * Fetch a paginated list of questions.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function questions(Request $request)
    {
        $questions = Question::latest()->filter()->paginate(50);
        return QuestionResource::collection($questions);
    }
}
