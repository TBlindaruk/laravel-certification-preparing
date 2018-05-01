<?php
declare(strict_types = 1);

namespace App\Http\Requests\Task;

use App\Http\Requests\AbstractRequest;

/**
 * Class TaskStoreRequest
 *
 * @package App\Requests
 */
class TaskStoreRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:255',
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
