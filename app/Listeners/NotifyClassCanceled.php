<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use App\Jobs\NotifyClassCanceledJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {
        //
        $scheduledClass = $event->scheduledClass;
        // Log::info($scheduledClass);
          var_dump($scheduledClass);
          die();
        $members = $event->scheduledClass->members()->get();
        $className = $event->scheduledClass->classType->name;
        $classDateTime = $event->scheduledClass->classType->date_time;
        $details = compact('className','classDateTime');
        NotifyClassCanceledJob::dispatch($members,$details);
    }
}
