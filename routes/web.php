<?php

use Illuminate\Support\Facades\Route;

use App\Models\Task;

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/tasks/{perm}', function( $perm ) {
    return view('tasks', [ 'perms' => $perm, 'tasks' => Task::all() ] );
});

Route::get('/tasks/{perm}/{task:id}', function( $perm, Task $task ){
    return view('onetask', [ 'tasky' => $task, 'perms' => $perm ] );
});

Route::get( '/complete_task/{perm}/{task:id}', function( $perm, Task $task){
    if( is_null( $task->completed_at ) ){
        $task->completed_at = Carbon::now()->toDateTimeString();
        $task->save();
        return view('prompt', [ 'header' => "Task Complete!", 'message' => "Task marked as complete.",
                                'returnLink' => '/tasks/'.$perm ] );
    }
    else{
        return view('prompt', [ 'header' => "Task Complete!", 'message' => "Task was already completed.",
                                'returnLink' => '/tasks/'.$perm ] );
    }
});

Route::get( '/delete_task/{perm}/{task:id}', function( $perm, Task $task){
    $task->delete();
    return view('prompt', [ 'header' => "Task Deleted!", 'message' => "Task was successfully deleted.",
                            'returnLink' => '/tasks/'.$perm ] );
    
});

Route::get( '/edit_task/{perm}/{task:id}', function( $perm, Task $task ){
    if( $perm == "parent" ){
        return view( 'edittask', [ 'perms' => $perm, 'task' => $task ] );
    }
    else{
        return redirect('tasks/'.$perm );
    }   
});

Route::get( '/newtask/{perms}', function( $perm ){
    if( $perm == "parent" ){
        return view( 'newtask', [ 'perms' => $perm ] );
    }
    else{
        return redirect('tasks/'.$perm );
    }
});

Route::post( '/publish_task', function(){

    $a = new App\Models\Task;

    $a->title = request()->input('name');
    $a->body = request()->input('deets');

    $a->save();

    return view('prompt', [ 'header' => "Task Created!", 'message' => "Task successfully published.",
                            'returnLink' => '/tasks/parent' ] );
});

Route::post( '/update_task/{task:id}', function( Task $task ){

    $task->title = request()->input('name');
    $task->body = request()->input('deets');

    $task->save();

    return view('prompt', [ 'header' => "Task Updated!", 'message' => "Task successfully updated.",
                            'returnLink' => '/tasks/parent' ] );
});