<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AvatarViewController extends Controller
{
    public function index(): View
    {
        $avatars = Avatar::all();
        return view('avatar.index', compact('avatars'));
    }
}
