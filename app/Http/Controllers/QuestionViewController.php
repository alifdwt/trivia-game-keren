<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionViewController extends Controller
{
    public function index(): View
    {
        $questions = Question::all();
        return view('pages.question', compact('questions'));
    }
}
