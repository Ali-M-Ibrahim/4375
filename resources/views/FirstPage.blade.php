<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
@include('nav')

<p> {{ $data1  }}   </p>
<p>The teacher is: {{$data2}}</p>
<p>The date of today is: {{$data3}}</p>
<p>{{$nbofcredits}}</p>

@for($i=0;$i<10;$i++)
    {{$i}}
@endfor

@if(true)
    <p>result of the condition</p>
    @endif
</body>
</html>
