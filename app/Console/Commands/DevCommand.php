<?php

namespace App\Console\Commands;

use App\Jobs\SomeJob;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some develops';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        SomeJob::dispatch();
//        SomeJob::dispatchSync()->onQueue('some_queue');
//        php artisan queue:work --queue=some_queue
        SomeJob::dispatch()->onQueue('some_queue');

    }


}
