<!DOCTYPE html>

<head>
	<meta charset="utf-8">

	<title> Edit Task </title>

</head>
<body bgcolor="#8DB3B8">

	<h1> Edit Task </h1>

	<form style="display: inline-block;" method = 'POST' action="/update_task/{{$task->id}}">
        @csrf
        Task Name: <input type='string' name='name' value = {{$task->title}} <br> <br>
        Task Details: <input type='text' name='deets' value = {{$task->body}} <br> 

        <br> <br>
        
        <button type='submit'> Save! </button>
    </form>

	<form style="display: inline;" method = 'GET' action="/tasks/{{$perms}}/{{$task->id}}">
        @csrf
        <button type='submit'> Cancel </button>
    </form>

</body>