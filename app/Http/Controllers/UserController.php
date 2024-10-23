<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Scopes\ActiveScope;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withoutGlobalScope(ActiveScope::class)->get();

        $data = [
            'users' => $users,
            'page_title' => 'Manage Users',
            'menu' => 'User'
        ];

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page_title' => 'Create User',
            'menu' => 'User'
        ];

        return view('user.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // Upload user image
        $file_name = '';
        if ($request->image) {
            $file_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/users'), $file_name);
        }

        // Create User
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'designation' => $request->designation,
            'image' => $file_name,
            'password' => bcrypt($request->password)
        ]);

        return response()->successMessage('User Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withoutGlobalScope(ActiveScope::class)->findOrFail($id);

        $data = [
            'user' => $user,
            'page_title' => 'Edit User',
            'menu' => 'User'
        ];

        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::withoutGlobalScope(ActiveScope::class)->find($id);

        if ($user) {
            // Default Image
            $file_name = $user->image;

            if ($request->image) {
                // Unlink Image
                $image_path = public_path('uploads/users/'.$user->image);
                if (is_file($image_path)) unlink($image_path);
                
                $file_name = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $file_name);
            }

            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'designation' => $request->designation,
                'image' => $file_name
            ];

            // If password exists in request update password
            if ($request->password) $data['password'] = bcrypt($request->password);

            // Update User
            $user->update($data);

            return response()->successMessage('User Updated Successfully!');
        }

        return response()->errorMessage('User not Found !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withoutGlobalScope(ActiveScope::class)->find($id);
        
        if ($user) {
            if ($user->is_admin) {
                return response()->errorMessage('The Admin can not be delete!');
            }

            $user->delete();
            return response()->successMessage('User Deleted Successfully !');
        }

        return response()->errorMessage('User not Found !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserStatus($id)
    {
        $user = User::withoutGlobalScope(ActiveScope::class)->findOrFail($id);

        if ($user) {
            if ($user->is_admin) {
                return response()->errorMessage('The Admin status can not be deactivate!');
            }

            $data['is_active'] = ($user->is_active == 1) ? 0 : 1;
            $user->update($data);
            return response()->success($data);
        }

        return response()->errorMessage('User not Found !');
    }
}
