<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function students(Batch $batch, Request $request)
    {
        $users = $batch->users;


        return view('vendor.voyager.batches.students', compact('users', 'batch'));
    }

    public function ban(Batch $batch, User $user)
    {
        $batch->users()->updateExistingPivot($user, ['active' => false]);
        return redirect()->back()->with([
            'message'    => __('voyager::generic.successfully_updated') . "This student is baned",
            'alert-type' => 'success',
        ]);
    }
    public function unban(Batch $batch, User $user)
    {
        $batch->users()->updateExistingPivot($user, ['active' => true]);
        return redirect()->back()->with([
            'message'    => __('voyager::generic.successfully_updated') . "This student is unbaned",
            'alert-type' => 'success',
        ]);
    }
}
