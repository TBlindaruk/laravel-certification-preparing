<?php
declare(strict_types = 1);

namespace App\Http\Resources\Api;

use App\Model\Token;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TaskResource
 *
 * @property Token $resource
 *
 * @package App\Http\Resources
 */
class TokenResource extends JsonResource
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
            'id'      => $this->resource->id,
            'expired' => $this->resource->expires_at->getTimestamp(),
        ];
    }
}
