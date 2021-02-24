<!DOCTYPE html>
<html>
<body>
<head>
<style>
h3{
    margin-left : 10%;
}
</style>
</head>

<h3>This page is for teacher login</h3>
{{Form::open(["url" => "/checkLogin?type=teacher"])}}
{{Form::label("Your email :")}}
{{Form::text("email",$email)}}
{{Form::label("Your password :")}}
{{Form::text("password")}}
{{Form::submit("Login")}}
{{Form::close()}}
@isset($wrong)
{{$wrong}}
@endisset

</body>
</html>