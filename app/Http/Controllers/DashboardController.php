<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersCount = User::count();
        $activeUsers = User::withoutGlobalScopes()->where([
            'deleted_at' => NULL,
            'is_active' => 1
        ])->count();

        $deActiveUsers = User::withoutGlobalScopes()->where([
            'deleted_at' => NULL,
            'is_active' => 0
        ])->count();

        $data = [
            'usersCount' => $usersCount,
            'activeUsers' => $activeUsers,
            'deActiveUsers' => $deActiveUsers,
            'page_title' => 'Dashboard',
            'menu' => 'Home'
        ];

    	return view('dashboard', compact('data'));
    }
}
