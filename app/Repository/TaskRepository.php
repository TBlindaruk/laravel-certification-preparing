<?php
declare(strict_types = 1);

namespace App\Repository;

use App\Model\Task;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TaskRepository
 *
 * @package App\Repository
 */
class TaskRepository
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Task::all();
    }
}