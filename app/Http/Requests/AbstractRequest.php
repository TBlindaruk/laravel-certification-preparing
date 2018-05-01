<?php
declare(strict_types = 1);

namespace App\Http\Requests;

use App\Exceptions\ApiValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AbstractRequest
 *
 * @package App\Http\Requests
 */
abstract class AbstractRequest extends FormRequest
{
    /**
     * @param Validator $validator
     *
     * @throws ApiValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw (new ApiValidationException($validator))->errorBag($this->errorBag);
    }
}
