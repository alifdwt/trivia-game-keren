<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            return response()->json([
                'code' => 200,
                'data' => $users
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                // 'name' => 'required|string|max:255',
                'avatar_id' => 'required|numeric',
                'email' => 'required|string|email|max:255',
                'username' => 'required|string|max:255',
                'diamonds' => 'required|numeric',
                'total_points' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'code' => 400,
                    'message' => $validator->errors()
                ]);
            }

            User::create($request->all());

            return response()->json([
                'code' => 200,
                'message' => 'User created successfully',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        try {
            $user = User::find($id);
            return response()->json([
                'code' => 200,
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'avatar_id' => 'required|numeric',
                // 'email' => ['required', Rule::unique('users')->ignore($user->$id)],
                // 'username' => ['required', Rule::unique('users')->ignore($user->$id)],
                'email' => 'required|string|email|max:255',
                'username' => 'required|string|max:255',
                'diamonds' => 'required|numeric',
                'total_points' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'code' => 400,
                    'message' => $validator->errors()
                ]);
            }

            $user->update($request->all());
            return response()->json([
                'code' => 200,
                'message' => 'User updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'User deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
}
