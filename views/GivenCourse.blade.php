<!DOCTYPE html>
<html>
<body>
<head>
<style>
.homeworkDeadline{
    display:  none;
}
a{
    color: darkblue;
}
a:hover{
    color: blue;
}
</style>
</head>

@for($i=0; $i < $count; $i++)
<h3>PATH{{$i+1}} :</h3>
<a href="uploadFile?course={{$course}}&path=path{{$i+1}}">Click here to upload file.</a><br><br>
@isset($teacherFiles[$i][0])
Your Files =
@foreach($teacherFiles[$i] as $files)

<a href="{{asset('storage/'.$course.'/path'.($i+1).'/teacherfiles/'.$files)}}">{{$files}}</a>,  
@endforeach
</br></br>
@endisset


@if($uploads[$i])
<a href="uploadedHomeworks?course={{$course}}&path=path{{$i+1}}">Click here to see homeworks uploaded by students</a>
@else
<button class="homeworkOpenButton">Click here to open homework upload</button>
<div class="homeworkDeadline"><br>

<form action="openUpload" mehtod="POST">
Please enter the deadline : <br><br>
<label>Day (1-7) :</label><input name="day" value="{{ old('day') }}">
<label>Month (1-12) : </label><input name="month" value="{{ old('month') }}">
<label>Year : </label><input name="year" value="{{ old('year') }}">
<label>Hour (0-23) : </label><input name="hour" value="{{ old('hour') }}">
<label>Minute :</label><input name="minute" value="{{ old('minute') }}">
<br><br><label>Please enter the size of the homework in megabytes (1-100). : <input name="size"> 
<br><br><label>Please enter the accepted file extension like ' .jpg,.webp,.pdf '. (.zip is automatically included.) : <input name="acptFiles">
<input name="course" value="{{$course}}" style="display:none">
<input name="path" value="path{{$i+1}}" style="display:none">
<button id="uploadOpen">Open</button>
</form>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<br>
@isset($custError)
{{$custError}}
@endisset
</div>
@endif
</br></br><br><br>
@endfor

<script>
var buttons = document.getElementsByClassName("homeworkOpenButton");
var homeworks = document.getElementsByClassName("homeworkDeadline");

for(var i=0; i<buttons.length; i++){
    buttons[i].addEventListener("click", e=>{display(e.target.nextElementSibling)});
}
function display(homeworkDeadline){
    homeworkDeadline.style.display = "inline-block";

}
</script>
</body>
</html>