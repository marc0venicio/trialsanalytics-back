<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetTenantIdInSession
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
    public function handle($event)
    {
        //dump(auth()->user()->tenant_id);
        //auth()->user()->tenant_id = $event->user->tenant_id;
        //dd(auth()->user()->tenant_id);
        //dd(session()->get('tenant_id'));
    }
}
