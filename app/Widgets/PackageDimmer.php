<?php

namespace App\Widgets;

use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class PackageDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Package::count();
     

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-treasure-open',
            'title'  => "{$count} Packages",
            'text'   => "You have ".$count." Packages in your database. Click on button below to view all posts.",
            'button' => [
                'text' => "View all exams",
                'link' => route('voyager.exams.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Page'));
    }
}
