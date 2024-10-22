<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function index()
{
    $data = User::where('is_admin', true)->get(); 
    return view('admin.dashboard', compact('data'));
}

}
