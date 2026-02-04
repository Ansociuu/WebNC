<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users for admin.
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // prevent deleting yourself
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users.index')->with('error', 'Bạn không thể xoá chính bạn.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được xóa.');
    }

    /**
     * Update the user's role (promote/demote).
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        // Prevent changing own role
        if (auth()->id() === $user->id && $validated['role'] !== $user->role) {
            return redirect()->route('admin.users.index')->with('error', 'Bạn không thể thay đổi vai trò của chính mình.');
        }

        $user->update(['role' => $validated['role']]);

        return redirect()->route('admin.users.index')->with('success', 'Vai trò người dùng đã được cập nhật.');
    }
}
