<?php

namespace App\Http\Controllers;

use App\User;
use App\UsersFilter;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('info');

        $users = (new UsersFilter($users, $request))->apply()->get();

//        if ($request->has('name')) {
//            $users->where('name', 'like', "%$request->name%");
//        }
//
//        if ($request->has('is_active')) {
//            $users->where('is_active', $request->is_active);
//        }
//
//
//        if ($request->has('birthday')) {
//
//            $users->whereHas('info', function ($query) use($request) {
//
//                $query->where('birthday', '>', $request->birthday);
//
//            });
//
//        }
//
//        if ($request->has('gender')) {
//            $users->where('gender', $request->gender);
//        }
//
//        $users = $users->get();

        return view('users.index', compact('users'));
    }
}
