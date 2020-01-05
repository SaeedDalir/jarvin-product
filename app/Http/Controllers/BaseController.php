<?php namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function customResponse($data = [], string $message = 'success', int $status = 200)
    {
        return response(['data' => $data, 'message' => $message, 'status' =>  $status], $status);
    }
}
