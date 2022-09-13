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
        $phones = [];
        if (strlen($message->numbers) <= 0) {
            $phones = array_reduce(User::take(10)->pluck('phone')->toArray(), function ($m, $str) {
                if (preg_match('/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/', $str, $matches))
                    $m[] = $matches[1];
                return $m;
            }, []);
        }
        $numbers =  $message->numbers ?? join(',', $phones);
        $send = Sms::compose($numbers, $message->message)->send();
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
