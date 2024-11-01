<?php

namespace App\Observers;

use App\Models\Flow;

class FlowObserver
{
    /**
     * Handle the Flow "created" event.
     */
    public function created(Flow $flow): void
    {
        /*
         * todo: burada flow oluştuktan sonra reader mı yoksa hook olduğuna bakılacak
         * register için communication service kullanılarak
         * tetikleyici kayıt edilecek
         */
    }

    /**
     * Handle the Flow "updated" event.
     */
    public function updated(Flow $flow): void
    {
        /*
         * todo: status durumuna göre tetikleyici kaldırılacak yada readerdan silinecek
         */
    }

    /**
     * Handle the Flow "deleted" event.
     */
    public function deleted(Flow $flow): void
    {
        //
    }

    /**
     * Handle the Flow "restored" event.
     */
    public function restored(Flow $flow): void
    {
        //
    }

    /**
     * Handle the Flow "force deleted" event.
     */
    public function forceDeleted(Flow $flow): void
    {
        //
    }
}
