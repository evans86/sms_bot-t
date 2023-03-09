<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\SmsUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = SmsUser::paginate(10);

        return view('user.index', compact(
            'users',
        ));
    }
}
