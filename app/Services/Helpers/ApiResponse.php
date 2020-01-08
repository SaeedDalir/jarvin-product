<?php namespace App\Services\Helpers;

class ApiResponse
{
    public function customResponse($data = [], string $message = 'done successfully', int $status = 200)
    {
        return response(['data' => $data, 'message' => $message, 'status' =>  $status], $status);
    }
}
