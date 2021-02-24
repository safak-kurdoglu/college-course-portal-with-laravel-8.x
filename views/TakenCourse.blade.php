<!DOCTYPE html>
<html>
<head>
<meta name="_token" content="{{csrf_token()}}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
a{
    color: darkblue;
}

a:hover{
    color: blue;
}
</style>
</head>
<body>
<h1>{{$course}}</h1>
@for($i = 1; $i <= 15; $i++)
<h3>PATH{{$i}} :</h3>
@isset($teacherFiles[$i-1][0])
Teacher Files :
@foreach($teacherFiles[($i-1)] as $files)
<a href="{{asset('storage/'.$course.'/path'.$i.'/teacherfiles/'.$files)}}">{{$files}}</a>, 
@endforeach
</br><br>
@endisset


@if($uploadOrNot[$i-1])
<a href="uploadHomework?course={{$course}}&path=path{{$i}}">Click here to upload Homework</a><br><br>
@isset($uploadedHomeworks[$i-1][0])
Your Homeworks :
@foreach($uploadedHomeworks[$i-1] as $homework)
<a href="{{asset('storage/'.$course.'/path'.$i.'/'.Auth::guard('webS')->user()->id.'/'.$homework)}}">{{$homework}},  </a>
@endforeach
@endisset
@endif
<br><br><br>
@endfor

<script>

</script>

</body>
</html> 

