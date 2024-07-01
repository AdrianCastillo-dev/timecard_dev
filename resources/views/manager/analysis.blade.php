@extends('layouts.app')
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script src=
        "https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
        <link
            rel="stylesheet"
            href=
        "https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css"
        />
        <link
            rel=
        "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
            type="text/css"
        />
        
        <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>
        <script src=
        "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
        </script>
        
        <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
        </script>
        
        <style>
            body {
            text-align: center;
            color: green;
            }
            h2 {
            text-align: center;
            font-family: "Verdana", sans-serif;
            font-size: 40px;
            }
        </style>
@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col">
      <div class="col-15">
          <h2>Activities</h2>
          <div id="donut-chart"></div>
        </div>
    </div>
    <div class="col">
        <div class="col-10">
          <h2>Direct Activities</h2>
          <div id="donut-chart2"></div>
       </div>
    </div>
  </div>
</div>

<div class="container text-center">
  <div class="row">
    <div class="col">
      <div class="col-15">
      <h2>Activities</h2>
          <table class="table table-bordered table-responsive-lg">
              <tr>
                  <th>Activity</th>
                  <th>Time</th>
              </tr>
              @foreach($time_activity as $time)
                <tr>
                    <td>{{$time->activities}}</td>
                    <td>{{$time->s}}</td>
                </tr>
              @endforeach
          </table>
        </div>
    </div>
    <div class="col">
        <div class="col-10">
          <h2>Direct Activities</h2>
          <table class="table table-bordered table-responsive-lg">
              <tr>
                <th>Activity</th>
                <th>Time</th>
                <th>Action</th>
              </tr>
              @foreach($aps as $ap)
                <tr>
                    <td>{{$ap->name}}</td>
                    <td>{{$ap->e_t}}</td>
                    <td>
                      <a href="/manager/analysis/{{$ap->id}}" class="btn" style="background-color: #FFE4B5;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                      </svg>
                      </a>
                    </td>
                </tr>
              @endforeach
          </table>
       </div>
    </div>
  </div>
</div>


<script>

  var json_aps = '{{$json_aps}}';
  json_aps = json_aps.replace(/&quot;/g,'"');
  var json_aps_parsed = JSON.parse(json_aps);

  console.log(json_aps);
  var columns2 = json_aps_parsed.map(function(item) {
    return [item.name, parseInt(item.e_t)];
  });

  var time_activity = '{{$json_time_activity}}';
  time_activity = time_activity.replace(/&quot;/g,'"');
  var time_activity_parsed = JSON.parse(time_activity);

  console.log(time_activity_parsed);
  var columns = time_activity_parsed.map(function(item) {
    return [item.activities, parseInt(item.s)];
  });

  var chart = bb.generate({
    data: {
      columns: columns,
      type: "donut",
    },
    bindto: "#donut-chart",
  });
  var chart = bb.generate({
    data: {
      columns: columns2,
      type: "donut",
    },
    bindto: "#donut-chart2",
  });
</script>

@endsection