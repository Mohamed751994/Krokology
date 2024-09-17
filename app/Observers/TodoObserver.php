<?php

namespace App\Observers;

use App\Mail\TodoEmail;
use App\Models\Todo;
use Illuminate\Support\Facades\Mail;

class TodoObserver
{
    /**
     * Handle the Todo "created" event.
     */
    public function created(Todo $todo): void
    {
        //Send Mail after created
        /*** I Comment it because not email configurations ***/
//        Mail::to(auth()->user()->email)->send(new TodoEmail([
//            'type' => 'Created',
//            'user_name' => auth()->user()->name,
//            'todo_title' => $todo->title,
//        ]));
    }

    /**
     * Handle the Todo "updated" event.
     */
    public function updated(Todo $todo): void
    {
        //send mail after updated
        /*** I Comment it because not email configurations ***/
//        Mail::to(auth()->user()->email)->send(new TodoEmail([
//            'type' => 'Updated',
//            'user_name' => auth()->user()->name,
//            'todo_title' => $todo->title,
//        ]));
    }

    /**
     * Handle the Todo "deleted" event.
     */
    public function deleted(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "restored" event.
     */
    public function restored(Todo $todo): void
    {
        //
    }

    /**
     * Handle the Todo "force deleted" event.
     */
    public function forceDeleted(Todo $todo): void
    {
        //
    }
}
