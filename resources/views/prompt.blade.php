<!DOCTYPE html>

<head>
	<meta charset="utf-8">

	<title> {{ $header }} </title>

</head>
<body bgcolor="#8DB3B8">

	<h1> {{ $message }} </h1>

	<form method = 'GET' action={{ $returnLink }}>
        @csrf
        <button type='submit'> Return to Tasks List </button>
    </form>

</body>