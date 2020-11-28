<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ url('/w3theme/css/w3.css') }}">
    <script src="{{ url('/w3theme/jquery.min.js') }}"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="w3-light-gray">
    @if ($message=Session::get('error'))
    <div class="w3-container w3-red w3-col m6 w3-display-topright">
        <button onclick="this.parentElement.style.display='none'"
        class="w3-button w3-large w3-right">&times;</button>
        <p>{{ $message }}</p>
    </div>
    @endif
    @if(count($errors) > 0)
        <div class="w3-container w3-red w3-col m6 w3-display-topright">
            <button onclick="this.parentElement.style.display='none'"
            class="w3-button w3-large w3-display-topright">&times;</button>
            <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col m4">
                <p></p>
            </div>
            <div class="w3-col m4" style="margin-top: 5%">
                <div class="w3-container w3-card-4 w3-round-large" style="background: -webkit-linear-gradient(left,#CFF4D2,#7BE495);">
                    <div class="w3-center" style="padding-top: 50px;">
                        <img src="{{ url('images/admin.png') }}" alt="" width="20%" height="20%" class="w3-image">
                    </div>
                    <form class="w3-container" action="{{ url('check') }}" method="post" style="padding-bottom: 50px">
                        {{ csrf_field() }}
                        <p>
                            <label for="" class="w3-large" style="text-shadow:1px 1px 0 #444">ຊື່ຜູ້ໃຊ້:</label>
                            <input type="text" class="w3-input w3-round-large" name="username" placeholder="ໃສ່ຊື່ຜູ້ໃຊ້...">
                        </p>
                        <p>
                            <label for="" class="w3-large" style="text-shadow:1px 1px 0 #444">ລະຫັດຜ່ານ</label>
                            <input type="password" class="w3-input w3-round-large" id="password" name="password" placeholder="ໃສ່ລະຫັດຜ່ານ...">
                        </p>
                        <p>    
                            <input type="checkbox" class="w3-check" id="showpass" onclick="showpassword();"><label for="" class="w3-large" style="text-shadow:1px 1px 0 #444"> ສະແດງລະຫັດ</label>
                        </p>
                        <p class="w3-center">
                            <button type="submit" class="w3-btn w3-blue w3-large w3-hover-orange w3-round-large"><i class="fa fa-sign-in"></i> ເຂົ້າສູ່ລະບົບ</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function showpassword(){
            var show = document.getElementById('password');
            if(show.type === "password"){
                show.type = "text";
            }else{
                show.type = "password";
            }
        }
    </script>
</body>
</html>