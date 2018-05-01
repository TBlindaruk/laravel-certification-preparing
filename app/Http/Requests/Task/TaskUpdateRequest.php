<?php
declare(strict_types = 1);

namespace App\Http\Requests\Task;

use App\Http\Requests\AbstractRequest;

/**
 * Class TaskUpdateRequest
 *
 * @package App\Http\Requests\Task
 */
class TaskUpdateRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'       => 'string|max:255',
            'description' => 'string|max:255',
        ];
    }
    
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
