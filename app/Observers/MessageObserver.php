<?php

namespace App\Observers;

use App\Facades\SMS\Sms;
use App\Message;
use App\Models\User;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     *
     * @param  \App\Models\Message  $message
     * @return void
     */
    public function created(Message $message)
    {
        $numbers =  $message->numbers ?? join(',',User::all()->pluck('phone')->toArray());
       $send = Sms::compose($numbers,$message->message)->send();
 
    }

    /**
     * Handle the Message "updated" event.
     *
     * @param  \App\Models\Message  $message
     * @return void
     */
    public function updated(Message $message)
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     *
     * @param  \App\Models\Message  $message
     * @return void
     */
    public function deleted(Message $message)
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     *
     * @param  \App\Models\Message  $message
     * @return void
     */
    public function restored(Message $message)
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     *
     * @param  \App\Models\Message  $message
     * @return void
     */
    public function forceDeleted(Message $message)
    {
        //
    }
}
