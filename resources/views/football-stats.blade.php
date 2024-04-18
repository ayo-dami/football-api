<html>
<head> 
<title>Football stats</title>
</head>
<body>
    <container>
        <h1>Football Competitions</h1>
        <table>
            <tr>
                <th>Team Name</th>
                <th>Type</th>
                <th>Code</th>
            </tr>
            <tr>
            @foreach ($competitions as $competition)
                <td> {{ $competition['name'] }} </td>
                <td> {{ $competition['type'] }} </td>
                <td> {{ $competition['code'] }} </td>
            @endforeach
            </tr>
        </table>
    </container>
</body>
</html>