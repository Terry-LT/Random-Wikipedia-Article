<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('get_article',function(){
    $process = new Process(['./PythonScript/venv/bin/python3', './PythonScript/main.py']);
    $process->run();
    
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    $data = $process->getOutput();
    
    
    return $data;
});