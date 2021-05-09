<script>
    var homepage = '{{ url('/') }}';
</script>
<?php
    if(Session::get('login') or Session::get('login')==true)
    {
        echo "<script>window.location = homepage; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Tuhiro</title>
<!-- 

Eatery Cafe Template 

http://www.templatemo.com/tm-515-eatery

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <script>
        var base_url = '<?= url('/'); ?>';
        var site_url = '<?= url('/'); ?>';
        var site_name = '.: Tuhiro :.';
        var current_url = "{{ \Request::path() }}";
    </script>
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="icon" href="{{asset("/dist/images/logo.png")}}">
     <link rel="stylesheet" href="{{ asset("/dist/css/login-register.css")}}">

</head>

<body>
    <div class="register-page">
        <div class="form">
            <form class="login-form" name="register">
            <input type="text" name="name" placeholder="name" required="required"/>
            <input type="email" name="emailreg" placeholder="email address" required="required"/>
            <input type="number" name="mobile" placeholder="mobile" required="required"/>
            <input type="password" id="passwordreg" name="passwordreg" placeholder="password" required="required"/>
            <input type="password" name="confirm_password" placeholder="confirm password" required="required"/>
            <button type="submit">create</button>
            <p class="message">Already registered? <a href="{{ url('/page/login') }}">Sign In</a></p>
            </form>
        </div>
        <div style="text-align: center;">
            <img src="{{ url('/dist/images/tuhiro.jpg') }}" style="width: 200px;">
        </div>
    </div>
</body>

<script src="{{ asset("/dist/js/jquery.js")}}"></script>
<script src="{{ asset("/dist/js/jquery.validate.min.js")}}"></script>
<script src="{{ asset("/dist/js/sweetalert.min.js")}}"></script>
<script src="{{ asset("/dist/js/homepage.js")}}"></script>
</html>