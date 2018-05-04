<?php

namespace App\Api\Controllers;


use App\Api\Transformers\lessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;


class LessonsController extends BaseController
{
    public function index()
    {
        $lessons = Lesson::all();

        //return response()->json($lessons);
        return $this->response->collection($lessons,new lessonTransformer());
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (! $lesson){
            return $this->response()->errorNotFound(404);
        }

        return $this->response->item($lesson,new lessonTransformer());
    }
}
