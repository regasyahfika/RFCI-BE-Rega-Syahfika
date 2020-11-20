<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script>
        var count = 1;
        setInterval(postServer, 1000);

        function postServer() {
            $.ajax({
                headers: {
                    "X-RANDOM": "{{ \Illuminate\Support\Str::random(8) }}",
                    "X_CSRF-TOKEN": "{{ csrf_token() }}"
                },
                url: '',
                dataType: 'json',
                data: {
                    count: count
                },
                type: 'POST'
            })
            count++;
        }

    </script>
</body>

</html>
