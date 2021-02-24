<!DOCTYPE html>
<html>
<head>
<meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
body{
    margin: 0;
}

#left{
    width: 21vw;
    height: 100vh;
    border: 1px solid black;
    float: left;
}

#right{
    margin-top: 0;
    float: right;
    border: 1px solid black;
    height: 100vh;
    width: 21vw;
    
}

.coursesRight{
    width: 15vw;
    margin-left: 3vw;
    text-align: center;

}

.coursesLeft{
    text-align: center;

}

a{
    font-size: 20px;
}

h4{
    text-align: center;
    
}
</style>
</head>
<body>
<div id="left">
<h4> The courses you take :</h4>
@foreach($coursesTaken as $cs)
<p class="coursesLeft"><a href="toCourseTaken?course={{$cs}}">{{$cs}}</a></p>
@endforeach
</div>

<div id="right">
<h4 id="middleHeader"> The courses you don't take :</h4>
@foreach($coursesNotTaken as $cs)
<button class="coursesRight" onclick="myFunc('{{$cs}}')">{{$cs}}</button><br><br>
@endforeach
<p style="text-align: center">you can take these courses by clicking them</p>
</div>

<script>
function myFunc(s){
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: 'POST',
        url: '{{ url("courseAdd") }}',
        
        data: {course: s},
        dataType: 'json',
        success: function (e){
            alert("course " + e + " has been successfully added to your courses.");
            },
        error: function(e) {
            console.log(e);
            }
        });
}
</script>

</body>
</html> 

