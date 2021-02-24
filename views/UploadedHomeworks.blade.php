<!DOCTYPE html>
<html>
<body>
<head>
<style>

</style>
</head>

@foreach($datas as $dataForAStud)
</br>
no = {{$dataForAStud[0]}},  name = {{$dataForAStud[1]}},  files = 
@for($i=2; $i<count($dataForAStud); $i=$i+3)
<a href="{{asset('storage/'.$course.'/'.$path.'/'.$dataForAStud[0].'/'.$dataForAStud[$i])}}"><br>{{$dataForAStud[$i]}}</a> upload date={{gmdate("Y-m-d\TH:i:s\Z", $dataForAStud[$i+1])}}, {{$dataForAStud[$i+2]}}&nbsp;&nbsp;
@endfor
<br><br>
@endforeach

</body>
</html>