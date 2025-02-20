<?php

namespace App\Console\Commands;

use App\Models\Package;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpirePackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-package';

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
        $packages = Transaction::where("status", 1)->get();
        $now = Carbon::now();

        foreach ($packages as $key => $item)
        {

            if($now >= $item->end_date)
            {
                Transaction::where("id", $item->id)->update([
                    "status" => 0
                ]);
            }

        }
    }
}
