<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(15);

        return view('admin.user.user-list', compact('users'));
    }

    public function ban($id)
    {
        User::findOrFail($id)->toggleBan();
        return [
            'success' => true,
            'message' => 'وضعییت مسدودی تغییر کرد'
        ];
    }
}
