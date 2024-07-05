<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ReadModule;
use Illuminate\Support\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserDetailResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users', [
            "title" => "Users - SiCantik Admin Panel",
            "pageIndex" => 1,
            "users" => $users,
        ]);
    }

    public function view(String $id)
    {
        $user = User::find($id);
        $dateRegis = Carbon::createFromFormat('Y-m-d H:i:s', $user['created_at'])
            ->format('d M Y');

        return view('user_detail', [
            "title" => "Users - SiCantik Admin Panel",
            "pageIndex" => 1,
            "user" => $user,
            "dateRegis" => $dateRegis
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(
            [
                'messages' => "Successfully Registered A User",
                'data' => new UserDetailResource($user),
            ],
            Response::HTTP_OK
        );
    }

    public function delUser($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users')->with('success', 'Successfully delete a user');
        } else {
            return redirect('/users/view/' . $id)->withErrors('An error occurred when trying to delete user');
        }
    }

    // API Function

    public function getAllUsers()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function findUser($id)
    {
        $user = User::findOrFail($id);
        return new UserDetailResource($user);
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);


        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(
            [
                'messages' => "Successfully Registered A User",
                'data' => new UserDetailResource($user),
            ],
            Response::HTTP_CREATED
        );
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
        } else {
            return response()->json(
                [
                    'messages' => "Error when trying to delete user."
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        return response()->json([
            'messages' => "User Deleted Sucessfully",
            'data' => new UserDetailResource($user),
        ]);
    }

    public function postUserActivity(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'module_id' => 'required',
        ]);

        $description = "User id: [" . $validatedData['user_id'] . "] telah membaca module id: [" . $validatedData['module_id'] . "]";

        $logData = ReadModule::create([
            'user_id' => $validatedData['user_id'],
            'module_id' => $validatedData['module_id'],
            'description' => $description,
        ]);

        return response()->json(
            [
                'messages' => "Successfully Update User Activity",
            ],
            Response::HTTP_CREATED
        );
    }
}
