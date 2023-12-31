<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Worker\StoreRequest;
use App\Http\Requests\API\Worker\UpdateRequest;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return WorkerResource::collection($workers);

    }

    public function show(Worker $worker)
    {
        return WorkerResource::make($worker);

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $worker = Worker::create($data);
        return WorkerResource::make($worker);
    }

    public function update(UpdateRequest $request, Worker $worker)
    {
        $data = $request->validated();
        $worker->update($data);
        $worker->fresh();
        return WorkerResource::make($worker);
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return response()->json([
            'message'=>'success'
        ]);
    }
}
