<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\CloudinaryStorage;

class AvatarViewController extends Controller
{
    public function index(): View
    {
        $avatars = Avatar::orderBy("id")->get();
        return view("pages.avatar", compact("avatars"));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            "image_src" => "required|image|mimes:jpeg,jpg,png|max:2048",
            "price" => "required|numeric",
        ]);

        $image = $request->file("image_src");
        $result = CloudinaryStorage::upload(
            $image->getRealPath(),
            $image->getClientOriginalName()
        );

        Avatar::create([
            "image_src" => $result,
            "price" => $request->price,
        ]);

        return redirect()
            ->back()
            ->with("success", "Avatar created successfully");
    }

    public function show($id): View
    {
        $avatar = Avatar::findOrFail($id);
        return view("pages.avatar", compact("avatar"));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $avatar = Avatar::findOrFail($id);
        $this->validate($request, [
            "image_src" => "required|image|mimes:jpeg,jpg,png|max:2048",
            "price" => "required|numeric",
        ]);

        $image = $request->file("image_src");
        $result = CloudinaryStorage::upload(
            $image->getRealPath(),
            $image->getClientOriginalName()
        );

        $avatar->update([
            "image_src" => $result,
            "price" => $request->price,
        ]);

        return redirect()
            ->back()
            ->with("success", "Avatar updated successfully");
    }

    public function destroy($id): RedirectResponse
    {
        $avatar = Avatar::findOrFail($id);
        $avatar->delete();

        return redirect()
            ->back()
            ->with("success", "Avatar deleted successfully");
    }
}
