<!DOCTYPE html>
<html>
<head>
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    setInterval("my_function();",1000); 
    function my_function(){
      $('#refresh').load(location.href + ' #time');
      $('#humid').load(location.href + ' #humiddata');
      $('#temp').load(location.href + ' #tempdata');
      $('#env').load(location.href + ' #envdata');
      $('#light').load(location.href + ' #lightdata');
    }
  </script>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 7px; 
  width: 9%;
}
.button2 {
  background-color: #4CAF50; /* Green */
  border-radius: 3px;
  border: none;
  color: black;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;
}
.butt1{
  background-color: #FFFFFF; /* white */
  border-radius: 3px;
  border: none;
  color: red;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
  font-weight: bold;

  }


</style>
  </head>
<body>





    <table style="width:100%">

    <tr>
      <th  colspan=2 style="background-color: rgb(160,100,184);font-size: 20px;">
      <div id="refresh">
  <div id="time">
    <?php echo date('H:i:s');?><br>
    Last Update : {{$plantdata[0]->updated_at}}
  </div>
</div>
  </th>
    </tr>
    <tr>
      <td colspan=2>

        <table class="tbl">
        <tbody>
        <tr>
        <th>&nbsp;List</th>
        <th>&nbsp;Value</th>
        <th>&nbsp;Accuracy</th>
        </tr>
        <tr>
        <td>&nbsp;Expected Harvest Date</td>
        <td>&nbsp;
        <?php
        $future = strtotime('2 April 2023');
        $now = time();
        $timeleft = $future-$now;
        $daysleft = round((($timeleft/24)/60)/60); 
        echo("Within ".$daysleft." Days");
        ?></td>
        <td>&nbsp;53%</td>
        </tr>
        <tr>
        <td>&nbsp;Expected Quality</td>
        <td>&nbsp;N/A</td>
        <td>&nbsp;N/A</td>
        </tr>
        <tr>
        <td>&nbsp;Expected</td>
        <td>&nbsp;N/A</td>
        <td>&nbsp;N/A</td>
        </tr>
        </tbody>
        </table>

      </td>
    </tr>
    <tr>
      <th colspan=2>
      <a href="./0.125"><button type="button" class="button">3 Hours</button></a>
      <a href="./0.25"><button type="button" class="button">6 Hours</button></a>
      <a href="./0.5"><button type="button" class="button">12 Hours</button></a>
      <a href="./1"><button type="button" class="button">1 Day</button></a>
      <a href="./7"><button type="button" class="button">7 Days</button></a>
      <a href="./30"><button type="button" class="button">1 Month</button></a>
      <a href="./90"><button type="button" class="button">3 Months</button></a>
      <a href="./180"><button type="button" class="button">6 Months</button></a>
      <a href="./365"><button type="button" class="button">12 Months</button></a>
      <a href="./1024"><button type="button" class="button">Lifetime</button></a>
      </th>
    </tr>
  <tr>
    <th width=50% style="background-color: rgb(118,242,184);font-size: 34px;">
    <div id="humid">
      <div id="humiddata">
      Plant Humidity <br> 
      <button type="button" class="butt1" >Current :</button>
      <button type="button" class="button2">plant 1 = {{$plantdata[0]->moise}}</button>
      <button type="button" class="button2">plant 2 = {{$plantdata[1]->moise}}</button>
      <button type="button" class="button2">plant 3 = {{$plantdata[2]->moise}}</button>
      <button type="button" class="button2">plant 4 = {{$plantdata[3]->moise}}</button>
      <button type="button" class="button2">plant 5 = {{$plantdata[4]->moise}}</button>
      </div>
      </div>
  </th>
    <th width=50% style="background-color: rgb(255,145,167);font-size: 34px;">
      <div id="temp">
      <div id="tempdata">
      Temperature : {{$plantdata[0]->temp}}
      </div>
      </div>
  </th>
  </tr>

  <tr>
    <td><canvas id="myChart" ></canvas></td>
    <td><canvas id="myChart2" ></canvas></td>
    </tr>

    <tr>
    <th width=50% style="background-color: rgb(118,196,242);font-size: 34px;">
    <div id="env">
      <div id="envdata">
      Environment Humid : {{$plantdata[0]->hum}}
      </div>
      </div>
  </th>
    <th width=50% style="background-color: rgb(255,243,129);font-size: 34px;">
    <div id="light">
      <div id="lightdata">
      Light Level : {{$plantdata[0]->light}}
      </div>
      </div></th>
  </tr>
    <tr>
    <td><canvas id="myChart3" ></canvas></td>
    <td><canvas id="myChart4" ></canvas></td>
  </tr>

</table>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var labels =  {{ Js::from($labels) }};  
    var users =  {{ Js::from($data) }};
    var labels2 =  {{ Js::from($labels2) }};
    var users2 =  {{ Js::from($data2) }};
    var labels3 =  {{ Js::from($labels3) }};
    var users3 =  {{ Js::from($data3) }};
    var labels4 =  {{ Js::from($labels4) }};
    var users4 =  {{ Js::from($data4) }};
    var labels5 =  {{ Js::from($labels5) }};
    var users5 =  {{ Js::from($data5) }};
    var lab_temp =  {{ Js::from($lab_temp) }};
    var lab_data =  {{ Js::from($lab_data) }};
    var env_temp =  {{ Js::from($env_temp) }};
    var env_data =  {{ Js::from($env_data) }};
    var lit_temp =  {{ Js::from($lit_temp) }};
    var lit_data =  {{ Js::from($lit_data) }};

    const data_temp = {
        labels: labels,
        datasets: [{
          label: 'Temperature',
          backgroundColor: 'rgb(255,85,114)',
          borderColor: 'rgb(255,41,41)',
          data: lab_data,
        }]
    }
    const data_lit = {
        labels: labels,
        datasets: [{
          label: 'Light Level',
          backgroundColor: 'rgb(255,239,85)',
          borderColor: 'rgb(202,121,0)',
          data: lit_data,
        }]
    }
    const data_env = {
        labels: labels,
        datasets: [{
          label: 'Environment Humid',
          backgroundColor: 'rgb(118,196,242)',
          borderColor: 'rgb(34,77,247)',
          data: env_data,
        }]
    }
    const data = {
        labels: labels,
        datasets: [{
          label: 'Plant 1',
          backgroundColor: 'rgb(0, 0, 0)',
          borderColor: 'rgb(0, 0, 0)',
          data: users,
        }
        ,
        {
          label: 'Plant 2',
          backgroundColor: 'rgb(255, 0, 0)',
          borderColor: 'rgb(255, 0, 0)',
          data: users2,
        }
        ,
        {
          label: 'Plant 3',
          backgroundColor: 'rgb(0, 255, 0)',
          borderColor: 'rgb(0, 255, 0)',
          data: users3,
        }
        ,
        {
          label: 'Plant 4',
          backgroundColor: 'rgb(0, 0, 255)',
          borderColor: 'rgb(0, 0, 255)',
          data: users4,
        }
        ,
        {
          label: 'Plant 5',
          backgroundColor: 'rgb(255, 0, 255)',
          borderColor: 'rgb(255, 0, 255)',
          data: users5,
        }
        ]
      };

      const config = {
        type: 'line',
        data: data,
        options: {
          scales: {
        y: {
            min: 0,
            max: 1024,
        }
    }
        }
      };

      const config_temp = {
        type: 'line',
        data: data_temp,
        options: {}
      };

      const config_env = {
        type: 'line',
        data: data_env,
        options: {}
      };

      const config_lit = {
        type: 'line',
        data: data_lit,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
      const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config_temp
      );
      const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config_env
      );
      const myChart4 = new Chart(
        document.getElementById('myChart4'),
        config_lit
      );
</script>

</html>