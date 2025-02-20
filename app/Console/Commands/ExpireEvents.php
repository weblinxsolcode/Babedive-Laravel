<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::where("status", 1)->get();

        $now = Carbon::now();

        foreach ($events as $key => $event) {
            if($now > $event->to_date)
            {
                Event::where("id", $event->id)->update([
                    "status" => 2
                ]);
            }
        }
    }
}
