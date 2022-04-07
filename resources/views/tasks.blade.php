<!DOCTYPE html>

<head>
	<meta charset="utf-8">

	<title>Tasks</title>

</head>
<body bgcolor="#8DB3B8">

    <h1> All Tasks </h1>

	@foreach($tasks as $task)
        <article>
            <b>
                <a href = "/tasks/{{$perms}}/{{$task->id}}">
                    {{ $task->title }}
                </a>
            </b>
            <br>
            @if( $task->completed_at != null )
                Completed on: {{$task->completed_at}}
            @else
                Not Complete
            @endif

        </article>

        <br>

    @endforeach

    <br>
    No tasks left to show.

    <br> <br> <br>

    @if( $perms == "parent" )
        <form method = 'GET' action='/newtask/{{$perms}}'>
            @csrf
            <button type='submit'> New Task </button>
        </form>
        <br> 
    @endif

    <form method = 'GET' action='/'>
        @csrf
        <button type='submit'> Log-Out </button>
    </form>

    <br> <br> <br>

</body>