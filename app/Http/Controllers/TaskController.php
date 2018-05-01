<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Http\Resources\TaskCollectionResource;
use App\Http\Resources\TaskResource;
use App\Model\Task;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class TaskController
 *
 * @package App\Http\Controllers
 */
class TaskController extends BaseController
{
    /**
     * @return TaskCollectionResource
     */
    public function index()
    {
        return new TaskCollectionResource(Task::paginate());
    }
    
    /**
     * @param TaskStoreRequest $request
     *
     * @return TaskResource
     */
    public function store(TaskStoreRequest $request)
    {
        return new TaskResource(
            Task::create(
                [
                    'title'       => $request->get('title'),
                    'description' => $request->get('description'),
                ]
            )
        );
    }
    
    /**
     * @param Task $task
     *
     * @return TaskResource
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }
    
    /**
     * @param TaskUpdateRequest $request
     * @param Task              $task
     *
     * @return mixed
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->fill($request->only(['title', 'description']));
        $task->save();
        
        return new TaskResource($task);
    }
    
    /**
     * @param Task $task
     *
     * @return Response
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();
        
        return Response::create([sprintf('Task with id %s successfully delete', $task->id)]);
    }
}
