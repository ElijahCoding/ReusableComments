<?php

namespace App\Http\Controllers\Courses;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CourseCommentController extends Controller
{
    public function index(Course $course)
    {
      return CommentResource::collection(
            $course->comments()->with(['children', 'user'])->get()
      );
    }

    public function store(Course $course, Request $request)
    {
      $this->validate($request, [
        'body' => 'required'
      ]);

      $comment = $course->comments()->make([
        'body' => $request->body
      ]);

      $request->user()->comments()->save($comment);

      return new CommentResource($comment);
    }
}
