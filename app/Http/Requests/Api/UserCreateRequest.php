<?php
declare(strict_types = 1);

namespace App\Http\Requests\Api;

use App\Http\Requests\AbstractRequest;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\Api
 */
class UserCreateRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'       => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required',
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
