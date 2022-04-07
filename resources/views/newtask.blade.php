<!DOCTYPE html>

<head>
	<meta charset="utf-8">

	<title> New Task </title>

</head>
<body bgcolor="#8DB3B8">

	<h1> Create New Task </h1>

	<form style="display: inline-block;" method = 'POST' action="/publish_task">
        @csrf
        Task Name: <input type='string' name='name'> <br> <br>
        Task Details: <input type='text' name='deets'> <br>

        <br> <br>
        
        <button type='submit'> Publish! </button>
    </form>

	<form style="display: inline;" method = 'GET' action="/tasks/{{$perms}}">
        @csrf
        <button type='submit'> Cancel </button>
    </form>

</body>