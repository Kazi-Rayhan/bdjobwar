<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function students(Batch $batch, Request $request)
    {
        $users = User::whereHas('batches', function ($query) use ($batch) {
            $query->where('batch_id', $batch->id);
        })->get();

        return view('vendor.voyager.batches.students', compact('users','batch'));
    }
}
