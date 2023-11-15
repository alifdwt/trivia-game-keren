<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserViewController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy("id")->get();
        return view("pages.user", compact("users"));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            "avatar_id" => "required|numeric",
            "email" => "required|string|max:255",
            "username" => "required|string|max:255",
            "diamonds" => "required|numeric",
            "total_points" => "required|numeric",
        ]);

        User::create($request->all());

        return redirect()
            ->back()
            ->with("success", "User created successfully");
    }

    public function show($id): View
    {
        $user = User::findOrFail($id);
        return view("pages.user", compact("user"));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            "avatar_id" => "required|numeric",
            "email" => "required|string|max:255",
            "username" => "required|string|max:255",
            "diamonds" => "required|numeric",
            "total_points" => "required|numeric",
        ]);

        $user->update($request->all());

        return redirect()
            ->back()
            ->with("success", "User updated successfully");
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->back()
            ->with("success", "User deleted successfully");
    }
}
