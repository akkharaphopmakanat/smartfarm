<!DOCTYPE html>
<html>
<head>
    <title>Chart</title>
</head>
<body>
    <h1>Chart</h1>
    <table style="width:100%">
  <tr>
    <th style="width:33.33%">Plant Humidity</th>
    <th style="width:33.33%">Temperature</th>
    <th style="width:33.33%">Environment Humidity</th>
  </tr>
  <tr>
    <td><canvas id="myChart" ></canvas></td>
    <td><canvas id="myChart2" ></canvas></td>
    <td><canvas id="myChart3" ></canvas></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
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

    const data_temp = {
        labels: labels,
        datasets: [{
          label: 'Temperature',
          backgroundColor: 'rgb(0, 0, 0)',
          borderColor: 'rgb(0, 0, 0)',
          data: lab_data,
        }]
    }
    const data_env = {
        labels: labels,
        datasets: [{
          label: 'Environment Humid',
          backgroundColor: 'rgb(0, 0, 0)',
          borderColor: 'rgb(0, 0, 0)',
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
        options: {}
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
</script>

</html>