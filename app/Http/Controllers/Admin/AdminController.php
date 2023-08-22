<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard', [
            'boss' => 'I am the boss'
        ]);
    }
    public function staff() {
        return view('admin.staff', [
            'staff' => ['Loris', 'Hugo', 'Elena']
        ]);
    }
    public function customers() {
        return view('admin.customers', [
            'customers' => ['customer1', 'customer2', 'customer3']
        ]);
    }
}
