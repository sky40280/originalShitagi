<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store()
    {
        
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}
