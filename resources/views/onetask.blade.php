<!DOCTYPE html>

<head>
	<meta charset="utf-8">

	<title>{{ $tasky->title }}</title>

</head>
<body bgcolor="#8DB3B8">
	<h1> Task: {{ $tasky -> title }} </h1>

	Details: {{ $tasky -> body }}

	<br><br><br>

	@if ( $tasky -> completed_at != null )
    	Marked as complete on: {{ $tasky -> completed_at }} <br> <br> 
    @elseif ( $perms == "child" )
        <form method = 'GET' action='/complete_task/{{$perms}}/{{ $tasky-> id}}'>
        	@csrf
        	<button type='submit'> Mark as Complete </button> <br> <br> 
    	</form>
    @elseif ( $perms == "parent" )
    	Not completed yet. <br> <br> <br> 
    @endif

    @if( $perms == "parent" )
    	<form method = 'GET' action='/edit_task/{{$perms}}/{{$tasky->id}}'>
        	@csrf
        	<button type='submit'> Edit Task </button>
    	</form> <br>

    	<form method = 'GET' action='/delete_task/{{$perms}}/{{$tasky->id}}'>
        	@csrf
        	<button type='submit'> Delete Task </button>
    	</form> <br>
    @endif

	<form method = 'GET' action='/tasks/{{ $perms }}'>
        @csrf
        <button type='submit'> Return to Tasks List </button>
    </form>

</body>