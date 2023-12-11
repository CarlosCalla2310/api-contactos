<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::select('*')->offset(intval($request->offset))->limit(intval($request->limit))->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $data = [
            'message' => 'User created successfully',
            'user' => $user
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user == null)
            $data = [
                'message' => 'User not found'
            ];
        else {
            $data = [
                'message' => 'User found',
                'user' => $user,
            ];
        }
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $message = 'User not found';
        if ($user != null) {
            $user->update($request->all());
            $message = 'Successfully modified user';
        }
        $data = [
            'message' => $message,
            'user' => $user
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        $data = [
            'message' => 'User deleted successfully',
            'user' => $user
        ];
        return response()->json($data);
    }
}
