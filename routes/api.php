<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Project;

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
Route::get('/projects',function (Request $request){
    $projects = Project::select(['id','project','company'])->get();
    return response()->json($projects->toArray(),200,['Content-type'=>'application/json;charset=utf-8','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
});

Route::get('/resolutions',function (Request $request){
    $projects = Project::select(['id','project','company'])->where('id',$request->project)->get();
    return response()->json($projects->toArray(),200,['Content-type'=>'application/json;charset=utf-8','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
});
Route::get('/storages',function (Request $request){
    $projects = Project::select(['id','project','company'])->where('id',$request->project)->get();
    return response()->json($projects->toArray(),200,['Content-type'=>'application/json;charset=utf-8','Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
