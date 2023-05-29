<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function batch_students(Batch $batch, Request $request)
    {
        $query = $request->get('q'); // Get the search query from the request

        $users = $batch->users()->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('phone', 'LIKE', '%' . $query . '%')
                ->orWhereHas('information', function ($queryBuilder) use ($query) {
                    $queryBuilder->where('id', $query);
                });
        })->paginate(20);

        return view('vendor.voyager.batches.students', compact('users', 'batch'));
    }

    public function batch_ban(Batch $batch, User $user)
    {
        $batch->users()->updateExistingPivot($user, ['active' => false]);
        return redirect()->back()->with([
            'message'    => __('voyager::generic.successfully_updated') . "This student is baned",
            'alert-type' => 'success',
        ]);
    }
    public function batch_unban(Batch $batch, User $user)
    {
        $batch->users()->updateExistingPivot($user, ['active' => true]);
        return redirect()->back()->with([
            'message'    => __('voyager::generic.successfully_updated') . "This student is unbaned",
            'alert-type' => 'success',
        ]);
    }
    public function batch_remove(Batch $batch, User $user)
    {
        $batch->users()->detach($user->id);
        return redirect()->back()->with([
            'message'    => __('voyager::generic.successfully_updated') . "This student is removed",
            'alert-type' => 'success',
        ]);
    }

    public function package_students(Package $package, Request $request)
    {
        $status = $request->get('s'); // Get the status from the request
        $query = $request->get('q'); // Get the search query from the request

        $usersQuery = User::whereHas('information', function ($queryBuilder) use ($package) {
            $queryBuilder->where('package_id', $package->id);
        })->where(function ($queryBuilder) use ($query, $status) {
            $queryBuilder->where('name', 'LIKE', '%' . $query . '%')->orWhere('phone', 'LIKE', '%' . $query . '%');
            if ($status === 'RUNNING') {
                $queryBuilder->whereHas('information', function ($queryBuilder) {
                    $queryBuilder->whereDate('expired_at', '>=', now());
                });
            } elseif ($status === 'EXPIRED') {
                $queryBuilder->whereHas('information', function ($queryBuilder) {
                    $queryBuilder->whereDate('expired_at', '<', now());
                });
            }
        });

        $expiredUserCount = User::whereHas('information', function ($queryBuilder) use ($package) {
            $queryBuilder->where('package_id', $package->id)->whereDate('expired_at', '<', now());
        })->count();

        $notExpiredUserCount = User::whereHas('information', function ($queryBuilder) use ($package) {
            $queryBuilder->where('package_id', $package->id)->whereDate('expired_at', '>=', now());
        })->count();

        $users = $usersQuery->paginate(20);

        $userCounts = [
            'expired' => $expiredUserCount,
            'not_expired' => $notExpiredUserCount,
        ];

        return view('vendor.voyager.packages.students', compact('users', 'package', 'userCounts'));
    }




    public function package_remove(Package $package, User $user)
    {

        $user->information->package_id = env('FREE_PACKAGE');
        $user->information->save();
        return redirect()->back()->with([
            'message'    => __('voyager::generic.successfully_updated') . "This student is removed",
            'alert-type' => 'success',
        ]);
    }
}
