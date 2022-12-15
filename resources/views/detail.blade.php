@extends('layouts.default')

@section('content')

<script>
  setInterval(function(){
    $("#toupdate").load(location.href + " #toupdate");
 }, 3000)
</script>


<div id="toupdate">
<div class="container">
    Hello , you are now viewing : {{$plant_id}}

</div>

<div class="card-group">
<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Plant ID</h5>
  <p>{{$plantdata->id ?? "Plant Unavailable or No Data"}}</p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Soil Moisture</h5>
  <p>{{$plantdata->moise ?? "Plant Unavailable or No Data"}}</p>
  <p>Percentage</p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Environment Humidity</h5>
  <p>{{$plantdata->hum ?? "Plant Unavailable or No Data"}}</p>
  <p>Percentage</p>
  </div>
</div>
</div>

<div class="card-group">
<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Environment Temperature</h5>
  <p>{{$plantdata->temp ?? "Plant Unavailable or No Data"}}</p>
  <p>Degrees Celsius</p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Environment Light Level</h5>
  <p>{{$plantdata->light ?? "Plant Unavailable or No Data"}}</p>
<p>Lux</p>  
</div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Soil PH</h5>
<p>{{$plantdata->nutrient ?? "Plant Unavailable or No Data"}}</p>
  </div>
  </div>
</div>
<div class="footer">
  Last Update : {{$plantdata->updated_at}}
</div>
</div>
@endsection




  
  
  
  