<?php

namespace App\Listeners;
use App\Events\PackageCounter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncreaseCounter
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
    public function handle(PackageCounter $event)
    {
        $this->updateViewer($event->post);
    }

    function updateViewer($post)
    {
        $post->viewer += 1 ;  
        $post->save();     
    }
}
