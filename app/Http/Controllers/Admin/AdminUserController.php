<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(10);

        return view('admin.users.adminUsers', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.adminUser', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно удалён');
    }
}
