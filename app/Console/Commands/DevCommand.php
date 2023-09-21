<?php

namespace App\Console\Commands;

use App\Http\Filters\WorkerFirst\WorkerFilter;
use App\Http\Filters\WorkerSecond\Worker\Age;
use App\Http\Filters\WorkerSecond\Worker\AgeFrom;
use App\Http\Filters\WorkerSecond\Worker\AgeTo;
use App\Http\Filters\WorkerSecond\Worker\Name;
use App\Jobs\SomeJob;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Routing\Pipeline;

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
        request()->merge(['age_from'=>19,'age_to'=>21]);
        $workers = app()->make(\Illuminate\Pipeline\Pipeline::class)
            ->send(Worker::query())
            ->through([
                Age::class,
                Name::class,
                AgeTo::class,
                AgeFrom::class,
            ])
            ->thenReturn();
        dd($workers->get()->toArray( ));
        return 0;
    }


}
