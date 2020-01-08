<?php namespace App\Exceptions;

use App\Services\Helpers\ApiResponse;

class BadRequestException extends \Exception
{
    public function render()
    {
        return (new ApiResponse())->customResponse([], 'Bad Request', 400);
    }
}
