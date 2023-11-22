<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            return response()->json([
                "code" => 200,
                "data" => $users,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => ["required", "string", "max:255"],
                "email" => [
                    "required",
                    "string",
                    "lowercase",
                    "email",
                    "max:255",
                    "unique:" . User::class,
                ],
                "username" => [
                    "required",
                    "string",
                    "max:255",
                    "unique:" . User::class,
                ],
                "password" => [
                    "required",
                    "confirmed",
                    Rules\Password::defaults(),
                ],
                "avatar_choices" => ["required"],
                "current_avatar" => ["required", "numeric"],
                "admin_code" => ["required", "string"],
                "diamonds" => ["numeric"],
                "total_points" => ["numeric"],
            ]);

            if ($request->admin_code !== env("ADMIN_CODE")) {
                return response()->json([
                    "code" => 403,
                    "message" => "Unauthorized! Wrong admin code",
                ]);
            }

            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "username" => $request->username,
                "password" => Hash::make($request->password),
                "current_avatar" => $request->current_avatar,
                "diamonds" => $request->diamonds,
                "total_points" => $request->total_points,
                // "email_verified_at" => $request->email_verified_at,
                // "remember_token" => $token,
            ]);

            $user->avatar()->attach($request->avatar_choices);

            return response()->json([
                "code" => 200,
                "message" => "User created successfully",
                "data" => $user,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        try {
            $user = User::find($id);
            return response()->json([
                "code" => 200,
                "data" => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $rules = [
                "name" => ["required", "string", "max:255"],
                "email" => [
                    "required",
                    "string",
                    "lowercase",
                    "email",
                    "max:255",
                    Rule::unique(User::class)->ignore($id, "id"),
                ],
                "avatar_id" => ["required", "numeric"],
                "diamonds" => ["required", "numeric"],
                "total_points" => ["required", "numeric"],
            ];

            if ($request->password === "") {
                // Jika password tidak diisi dalam request, jangan ubah password yang ada di database
                $request->merge(["password" => $user->password]);
            } elseif ($request->has("password")) {
                // Jika password diisi dalam request, gunakan password yang diberikan
                $request->merge(["password" => $request->password]);
            }
            // Cek apakah bidang password tidak kosong sebelum menambahkan aturan validasi
            if ($request->has("password")) {
                $rules["password"] = [
                    "nullable",
                    "confirmed",
                    Rules\Password::defaults(),
                ];
            }

            $this->validate($request, $rules);

            $user->update($request->all());
            return response()->json([
                "code" => 200,
                "message" => "User updated successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            return response()->json([
                "code" => 200,
                "message" => "User deleted successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "code" => 500,
                "message" => $e->getMessage(),
            ]);
        }
    }
}
