<?php
declare(strict_types = 1);

namespace App\Http\Resources\Api;

use App\Model\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TaskResource
 *
 * @property User $resource
 *
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
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
            'name'   => $this->resource->name,
            'email'  => $this->resource->email,
            'tokens' => TokenResource::collection($this->resource->tokens),
        ];
    }
}
