<?php

namespace App\Http\Controllers\api;

use App\Models\UserAvatar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userAvatars = UserAvatar::all();
            return response()->json([
                "code" => 200,
                "data" => $userAvatars,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $userAvatar = UserAvatar::find($id);
            return response()->json([
                "code" => 200,
                "data" => $userAvatar,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            UserAvatar::findOrFail($id)->delete();
            return response()->json([
                "code" => 200,
                "message" => "User avatar deleted successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }
}
