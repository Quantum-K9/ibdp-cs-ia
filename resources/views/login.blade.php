<!DOCTYPE html>

<head>
	<meta charset="utf-8">

	<title>Log-In</title>

</head>
<body bgcolor="#8DB3B8">

    <h1> IA Activity: CRUD Prototype: LMS Tasks </h1>

    <h2> Choose a user to log-in as: </h2>

    <form style="display: inline-block;" method = 'GET' action='/tasks/parent'>
        @csrf
        <button type='submit'> <h3> Parent </h3> </button>
    </form>

    &nbsp &nbsp &nbsp

    <form style="display: inline-block;" method = 'GET' action='/tasks/child'>
        @csrf
        <button type='submit'> <h3> Child </h3> </button>
    </form>

</body>