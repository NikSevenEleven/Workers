<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
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
//        $this->prepareData();

        $position =Position::find(1);
        $worker = Worker::find(1);
        dd($position->workers->toArray());
    }


    private function prepareData()
    {
        $position1 = Position::create([
           'title'=>'Developer'
        ]);

        $position2 = Position::create([
            'title'=>'Manager'
        ]);


        $workerData1 = [
            'name'=>'Ivan',
            'surname'=>'Ivanov',
            'email'=>'Ivan@mail.ru',
            'position_id'=>$position1->id,
            'age'=>'25',
            'description'=>'Some descr',
            'is_married'=>false,

        ];

        $workerData2 = [
            'name'=>'Karl',
            'surname'=>'Pertov',
            'email'=>'Karl@mail.ru',
            'position_id'=>$position2->id,
            'age'=>'21',
            'description'=>'abpout karl',
            'is_married'=>false,

        ];

        $workerData3 = [
            'name'=>'Kate',
            'surname'=>'Katevna',
            'email'=>'Kate@mail.ru',
            'position_id'=>$position1->id,
            'age'=>'18',
            'description'=>'Some descr',
            'is_married'=>false,

        ];
        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);

        $profileData1 = [
            'worker_id'=>$worker1->id,
            'city'=>'Tokio',
            'skill'=>'Coder',
            'experience'=>5,
            'finished_study_at'=>'2020-06-01',
        ];

        $profileData2 = [
            'worker_id'=>$worker2->id,
            'city'=>'Rio',
            'skill'=>'Boss',
            'experience'=>10,
            'finished_study_at'=>'2010-06-01',
        ];

        $profileData3 = [
            'worker_id'=>$worker3->id,
            'city'=>'Berlin',
            'skill'=>'FrontEnd',
            'experience'=>1,
            'finished_study_at'=>'2021-06-01',
        ];

        $profile = Profile::create($profileData1);
        $profile = Profile::create($profileData2);
        $profile = Profile::create($profileData3);

    }
}
