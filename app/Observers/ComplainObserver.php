<?php

namespace App\Observers;

use App\Complain;

class ComplainObserver
{
    /**
     * Handle the complain "created" event.
     *
     * @param  \App\Complain  $complain
     * @return void
     */
    public function created(Complain $complain)
    {
        //
    }

    /**
     * Handle the complain "updated" event.
     *
     * @param  \App\Complain  $complain
     * @return void
     */
    public function updated(Complain $complain)
    {
        //
    }

    /**
     * Handle the complain "deleted" event.
     *
     * @param  \App\Complain  $complain
     * @return void
     */
    public function deleted(Complain $complain)
    {
        //
    }

    /**
     * Handle the complain "restored" event.
     *
     * @param  \App\Complain  $complain
     * @return void
     */
    public function restored(Complain $complain)
    {
        //
    }

    /**
     * Handle the complain "force deleted" event.
     *
     * @param  \App\Complain  $complain
     * @return void
     */
    public function forceDeleted(Complain $complain)
    {
        //
    }
}
