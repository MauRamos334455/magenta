<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reporte de Participantes | MAGESTIC </title>
</head>
<style>
html{
	width:100%;
  height: 100%;
}
body{
  font-family: Arial, Helvetica, sans-serif;
}
#header{
  width: 100%;
  text-align:center;
  line-height:10px;
  display:inline-block;
  font-size: 15px;
}
.img-escudo{
  width: 32%;
}
.mg{
  width: 28%;
  border-bottom-right-radius: 20%;
  border-bottom-left-radius: 20%;
}
.left-header,.right-header{
  width: 30%;
  position:relative;
}
.right-header{
  float:right;
}
.center-header{
  width:100%;
  align:center;
  line-height:5px;
}  

th, td{
  text-align:center;
  border-bottom: 5pt solid white;
  font-size: 15px;
}
.activity{
  font-size: 16px;
  text-align: left;
  font-style: italic;
}

</style>
<body>
  <div id="header">
    <div class="left-header">
      <img class="img-escudo mg" src={!! public_path('img/logo-MAGESTIC.png') !!} align=left>
    </div>

    <div class="right-header">
      <img class="img-escudo" src={!! public_path('img/escudo_fi_color.png') !!} align=right>
    </div>

    <div class="center-header">
      <h2>MAGESTIC</h2>
      <h3>Facultad de Ingenierí­a</h3>
      <h3>Reporte de Criterio de Aceptación</h3>
      <h3>{!! $department !!}</h3>
      <h3>{!! $period !!}</h3>
      <hr>
    </div>
  </div>
  <div id="body">
    @foreach ($activities as $activity)
      <table>
        <tr>
          <th class="activity" colspan="5">{!! $activity->name !!}</th>
        </tr>
        <tr>
          <th>Cupo máximo</th>
          <th>Total de participantes</th>
          <th>Participantes extemporáneos</th>
          <th>Participantes adicionales</th>
          <th>Promedio (Asistentes/Cupo) </th>
        </tr>
        <tr>
          <td>{!! $activity->max_quota !!}</td>
          <td>{!! $activity->total_participants !!}</td>
          <td>{!! $activity->mistimed_participants !!}</td>
          <td>{!! $activity->additional_participants !!}</td>
          <td>{!! round($activity->average,2).'%' !!}</td>
        </tr>
      </table>
      <br>
    @endforeach
  </div>
</body>
</html>