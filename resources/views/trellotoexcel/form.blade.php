<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trello To Excel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
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

            .links > a {
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
                <form class="form">
                    <div class="form-group">
                        <label for="value_url">Trello Export JSON:</label>
                        <input type="text"
                        class="form-control" name="value_url" id="value_url" aria-describedby="helpId" placeholder="example url : https://trello.com/a/xxxxx.json">
                        <button class="btn-submit" type="submit">export</button>
                    </div>
                </form>
            </div>

        </div>

        {{--  <script src="{{asset('js/jquery/src/jquery.js')}}"></script>
        <script src="{{asset('js/jquery/src/ajax.js')}}"></script>  --}}
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://api.trello.com/1/client.js?key={a5d58a6d35aa7dffc4ad40721ab4cdab}"></script>
        <script type="text/javascript">
            var pefix_url = '{{url('')}}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $(".form").submit(function(e){
                e.preventDefault();
                var value_url = $("input[name=value_url]").val();

                $.ajax({
                    type:'GET',
                    url:'https://trello.com/b/cQfKVKok.json',
                    dataType: "JSON",
                    success:function(data){
                       console.log(data);
                    }
                 });

                {{--  $.ajax({
                   type:'GET',
                   url:pefix_url+'/ajaxGetData',
                   data:{value_url:value_url},
                   dataType: "JSON",
                   success:function(data){
                      console.log(data.value_url);
                   }
                });  --}}
            });
        
        </script>
    </body>
</html>
