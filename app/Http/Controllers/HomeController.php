<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    // public function packageBuy(Package $package)
    // {
   
    //     User::where('id',auth()->id())->update([
    //         'package_id'=> $package->id,

    //      ]);
    //     return back();
  
    // }

    public function download(Notice $notice)
    
    {
        dd($notice->fileLink);
        // dd(Voyager::image($notice->file));

        // $path = storage_path()."/app/public".$notice->file;
        // dd($path);
        // $path = Voyager::image($notice->file);
    //     $url = Storage::disk('public')->url($notice->file);
    //    dd($url);
        // $path = Storage::disk('public')->url($notice->file);
        $file=json_decode($notice->file);
        $path = Storage::disk('public')->url($file[0]->download_link);
       

        return download($path);
    }

}
