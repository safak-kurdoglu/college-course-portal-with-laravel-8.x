<!DOCTYPE html>
<html>
<body>
<head>
<style>

</style>
</head>
Just click to the course you give to progress :
@foreach($courseNames as $n)
<a href="toGivenCourse?course={{$n}}">{{$n}}</a><br>
@endforeach

</body>
</html>