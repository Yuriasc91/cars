<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sell;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function acquired()
    {
        $user = Auth::user();

        $acquired = Sell::with('Users')
        ->with('Car')
        ->where('user_id', '=', $user->id)
        ->get();

        return view('user.index', compact('acquired'));
    }
}
