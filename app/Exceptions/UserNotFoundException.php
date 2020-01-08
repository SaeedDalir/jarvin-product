<?php namespace App\Exceptions;

use App\Services\Helpers\ApiResponse;

class UserNotFoundException extends \Exception
{
    public function render()
    {
        return (new ApiResponse())->customResponse([], 'User not found', 404);
    }
}
