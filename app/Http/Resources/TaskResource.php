<?php
declare(strict_types = 1);

namespace App\Http\Resources;

use App\Model\Task;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TaskResource
 *
 * @property Task $resource
 *
 * @package App\Http\Resources
 */
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->resource->id,
            'title'       => $this->resource->title,
            'description' => $this->resource->description,
            'updated_at'  => $this->resource->updated_at->getTimestamp(),
        ];
    }
}
