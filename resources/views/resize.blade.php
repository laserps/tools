<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Resize Pictures
            </div>

            <div id="total">
                <h4>0</h4>
                </hr>
            </div>
            <div id="wrapper"></div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script>
        var url_gb = "{{url('')}}";
        $(document).ready(function () {
            $.ajax({
                method: "GET",
                url: url_gb + '/resizeimage',
                dataType: 'json',
            }).done(function (rec) {
                $.each(rec , function (k, v) {
                    resize(v,k)
                });
            }).fail(function () {
                console.log('errors');
            });
        });

        function resize(path, key) {

            $.ajax({
                method: "GET",
                url: url_gb + '/resizeimage/' + path,
                dataType: 'json',
            }).done(function (rec) {
                if (rec == 'success') {
                    $('#total').html('<h4>' + key + '</h4></hr>');
                    $('#wrapper').prepend('<p> ('+rec+') '+key+' . '+path+'</p></br>');
                } else {
                    $('#wrapper').prepend('<p> ('+rec+') '+key+' . '+path+'</p></br>');
                }
            }).fail(function () {
                console.log('fail error');
            });
        }
    </script>
</body>

</html>