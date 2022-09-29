<?php

namespace App\Console\Commands;

use App\Models\User;
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
        $users = User::where('active', 1)->whereRelation('information', 'is_paid', 1)->whereRelation('information', 'expired_at', '<', now())->get();
        foreach ($users as $user) {
            $user->information()->update([
                'is_paid' => 0
            ]);
        }
        dd($users->count().' is now disabled'); 
    }
}
