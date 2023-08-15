<?php

namespace App\Listeners;
use App\Events\CertificationCounter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CertificationIncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CertificationCounter $event)
    {
        $this->updateViewer($event->course);
    }

    function updateViewer($course)
    {
        $course->viewer += 1 ;  
        $course->save();     
    }
}
