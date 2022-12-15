@extends('layouts.default')
<style>
a:link, a:visited {
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  justify-content: center;
  width: 50%;
  height: 50%;
}

a.red{
  background-color: red;
}
a.green{
  background-color: lime;
}
</style>

<body>
    <center>
<a class="{{$color}}" href="?wish={{$wish}}">Relay Switch<br>Red = Off<br>Green = On</a>
</body>

@section('content')
@endsection