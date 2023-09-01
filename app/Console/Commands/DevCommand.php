<?php

namespace App\Console\Commands;

use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
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
//        $this->prepareManyToMany();

         $department =Department::find(1);
//        $position =Position::where('department_id',$department->id)
//            ->where('title','Boss')->first();
//        $worker=Worker::where('position_id',$position->id)->first();
//        dd($worker->toArray());

          $worker = Worker::find(7);
          dd($worker->position->department->toArray());

//        $department =Department::find(1);
//      dd($department->boss);

    }




    private function prepareData()
    {
        $department1 = Department::create(
            [
                'title'=>'IT'
            ]
        );

        $department2 = Department::create(
            [
                'title'=>'Analytics'
            ]
        );


        $position1 = Position::create([
           'title'=>'Developer',
            'department_id'=>$department1->id
        ]);

        $position2 = Position::create([
            'title'=>'Manager',
            'department_id'=>$department1->id
        ]);

        $position2 = Position::create([
            'title'=>'Designer',
            'department_id'=>$department1->id
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

        $workerData4 = [
            'name'=>'Denis',
            'surname'=>'Alekseev',
            'email'=>'Denis@mail.ru',
            'position_id'=>$position2->id,
            'age'=>'26',
            'description'=>'Some About Denis',
            'is_married'=>false,

        ];

        $workerData5 = [
            'name'=>'Ilia',
            'surname'=>'Kudimov',
            'email'=>'Ilia@mail.ru',
            'position_id'=>$position2->id,
            'age'=>'19',
            'description'=>'Some about Ilia',
            'is_married'=>false,

        ];

        $workerData6 = [
            'name'=>'Gven',
            'surname'=>'Mone',
            'email'=>'Gven@mail.ru',
            'position_id'=>$position1->id,
            'age'=>'28',
            'description'=>'Some about Gven',
            'is_married'=>true,

        ];
        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

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

        $profileData4 = [
            'worker_id'=>$worker4->id,
            'city'=>'Omsk',
            'skill'=>'FrontEnd',
            'experience'=>6,
            'finished_study_at'=>'2015-06-01',
        ];

        $profileData5 = [
            'worker_id'=>$worker5->id,
            'city'=>'Oslo',
            'skill'=>'Ui Designer',
            'experience'=>3,
            'finished_study_at'=>'2019-06-01',
        ];

        $profileData6 = [
            'worker_id'=>$worker6->id,
            'city'=>'Paris',
            'skill'=>'BackEnd',
            'experience'=>13,
            'finished_study_at'=>'2010-06-01',
        ];

        $profile = Profile::create($profileData1);
        $profile = Profile::create($profileData2);
        $profile = Profile::create($profileData3);
        $profile = Profile::create($profileData4);
        $profile = Profile::create($profileData5);
        $profile = Profile::create($profileData6);

    }



    private function prepareManyToMany()
    {
        $workerManager = Worker::find(2);
        $workerBackEnd = Worker::find(6);
        $workerBackEnd2 = Worker::find(1);
        $workerDesigner = Worker::find(5);
        $workerFrontEnd = Worker::find(4);
        $workerFrontEnd2 = Worker::find(3);

        $project1 = Project::create([
           'title'=>'Shop'
        ]);

        $project2 = Project::create([
            'title'=>'Blog'
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerManager->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerFrontEnd->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerBackEnd->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerDesigner->id,
        ]);



        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerManager->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerFrontEnd2->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerBackEnd2->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerDesigner->id,
        ]);

    }

    //8.45

}
