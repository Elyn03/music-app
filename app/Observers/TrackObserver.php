<?php

namespace App\Observers;

use App\Models\Track;

class TrackObserver
{
    /**
     * Handle the Track "created" event.
     */
    public function created(Track $track): void
    {
        //
    }

    /**
     * Handle the Track "updated" event.
     */
    public function updated(Track $track): void
    {
        //
    }

    /**
     * Handle the Track "deleted" event.
     */
    public function deleted(Track $track): void
    {
        //
    }

    /**
     * Handle the Track "restored" event.
     */
    public function restored(Track $track): void
    {
        //
    }

    /**
     * Handle the Track "force deleted" event.
     */
    public function forceDeleted(Track $track): void
    {
        //
    }
}
