<head>
    <meta charset="UTF-8">
    <title>Resume</title>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Параметр</th>
                <th>Значение</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Имя</td>
                <td>{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td>Фамилия</td>
                <td>{{ $data['surname'] }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $data['email'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
