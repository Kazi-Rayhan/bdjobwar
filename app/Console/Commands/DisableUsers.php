<?php

namespace App\Console\Commands;


use App\Models\UserMeta;
use Illuminate\Console\Command;

class DisableUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:disable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = UserMeta::where('is_paid', 1)->where('expired_at', '<', now())->get();
        foreach ($users as $user) {
            $user->update([
                'is_paid' => 0,
                'package_id' => 5,

            ]);
        }
       echo $users->count() . ' is now disabled';
    }
}
