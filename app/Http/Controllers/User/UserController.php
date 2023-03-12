<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\SmsUser;
use App\Services\Activate\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = SmsUser::paginate(10);

        return view('user.index', compact(
            'users',
        ));
    }

    public function balance()
    {
        $result = $this->userService->balance();

        return $result;
    }
}
