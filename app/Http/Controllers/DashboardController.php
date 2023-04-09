<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\UserExam;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function courses()
    {
        $courses = auth()->user()->batches;
        return view('dashboard.courses', compact('courses'));
    }

    public function editProfile()
    {
        return view('dashboard.editprofile');
    }

    public function package()
    {
        return view('dashboard.packages');
    }
    public function orders()
    {
        $orders = Order::where('user_id', Auth()->user()->id)->latest()->get();
        return view('dashboard.order', compact('orders'));
    }
    public function invoice(Order $order)
    {
        $pdf = PDF::loadView('dashboard.invoice', ['order' => $order]);

        return $pdf->download('order.pdf');
    }
    public function exams()
    {
        $exams = UserExam::where('user_id', Auth()->user()->id)->get();
        return view('dashboard.exams', compact('exams'));
    }
    public function favourites()
    {
        $favourites = Auth::user()->favourites()->paginate(10);
        return view('dashboard.favourites', compact('favourites'));
    }
    public function profile(Request $request)
    {
        $request->validate([
            'avatar' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'name' => ['required', 'max:40'],
            'email' => ['nullable', 'max:40', 'email'],
        ]);
        $user = Auth()->user();

        if ($request->has('avatar')) {
            if (Storage::has($user->avatar)) {
                Storage::delete($user->avatar);
            }
            $image = $request->avatar->store('user');
            $user->avatar = $image;
            $user->update();
        }

        $user->name = $request->name;
        $user->email = $request->email;


        $user->update();
        return redirect()->back()->with('success', 'Profile is now updated');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current' => 'required',
            'new' => 'required|min:4|same:confirm',
            'confirm' => 'required'
        ]);
        $user = User::find(auth()->id());

        if (Hash::check($request->current, $user->password)) {
            $user->password = Hash::make($request->new);
            $user->update();
        } else {
            return redirect()->back()->withErrors('Incorrect Password');
        }
        return redirect()->back()->with('success', 'Password changed');
    }
    public function testHistory()
    {
        $exams = Auth::user()->exams;

        return view('dashboard.test_history', compact('exams'));
    }
}
