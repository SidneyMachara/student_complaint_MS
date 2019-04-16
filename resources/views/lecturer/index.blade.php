@extends('layouts.lecturerlayout')

@section('content')

  <div class="">
    <div class="row mt-5">
      <div class="col-md-5 col-12">
        <div class="row mt-5">
            <table>
              <tr>
                <td><p class="h4 text-muted d-inline">Total complaints</p></td>
                <td><span class="font-weight-bold h3 ml-3" style="color:#ff5252">{{ array_sum($complaints_per_month) }}</span></td>
              </tr>
              <tr>
                <td><p class="h4 text-muted d-inline">Total Unsolved complaints</p> </td>
                <td><span class="font-weight-bold h3 ml-3" style="color:#ffee58">{{ array_sum($unsolved_complaints_per_month) }}</span></td>
              </tr>
              <tr>

                <td><p class="h4 text-muted d-inline">Total Solved complaints</p> </td>
                <td>  <span class="font-weight-bold h3 ml-3" style="color:#00e676">{{ array_sum($solved_complaints_per_month) }}</span></td>
              </tr>
            </table>

        </div>


      </div>
      <div class="col-md-7 col-12">
          <canvas id="myChart" width="" height=""></canvas>
      </div>
    </div>

  </div>

@endsection
@section('scripts')
  @section('scripts')
    <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
          datasets: [{
              label: '# All',
              data: {{ json_encode($complaints_per_month) }},
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              borderColor: 'rgba(255, 99, 132, 1)',
              borderWidth: 1
          },
          {
              label: '# Unsolved',
              data: {{ json_encode($unsolved_complaints_per_month) }},
              backgroundColor: '#fffde7',
              borderColor: '#f9a825',
              borderWidth: 1
          },
          {
              label: '# Solved',
              data: {{ json_encode($solved_complaints_per_month) }},
              backgroundColor: '#c8e6c9',
              borderColor: '#66bb6a',
              borderWidth: 1
          }]
      },
      options: {
        title: {
              display: true,
              text: '{{ date("Y") .' '. 'Complaints'}}'
          },
          scales: {
              yAxes: [{
                  ticks: {
                      precision:0,
                      beginAtZero: true
                  }
              }]
          }
      }
  });
  </script>
@endsection
