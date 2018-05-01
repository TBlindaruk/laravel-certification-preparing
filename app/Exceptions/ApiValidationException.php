<?php
declare(strict_types = 1);

namespace App\Exceptions;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/**
 * Class ApiValidationException
 *
 * @package App\Exceptions
 */
class ApiValidationException extends ValidationException implements Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return new Response(['errors' => $this->errors(),], Response::HTTP_BAD_REQUEST);
    }
}