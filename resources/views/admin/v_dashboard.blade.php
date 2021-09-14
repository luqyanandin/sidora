@extends('admin.v_template')
@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Welcome @auth{{ auth()->user()->name }}@endauth @guest User @endguest</h3>
            </div>

            
            <!-- AREA CHART -->
            <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Jumlah Rapat</h3>

                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="card card-info">
                  <div class="card-header">
                      <h3 class="card-title">Jumlah Tempat Rapat</h3>

                  </div>
                  <div class="card-body">
                      <div class="chart">
                          <canvas id="barChart3"
                              style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>
          </div>
        </div>
          </div>


            <script>
                $(function() {
                    /* ChartJS
                     * -------
                     * Here we will create a few charts using ChartJS
                     */


                    //--------------
                    //- AREA CHART -
                    //--------------

                    // Get context with jQuery - using jQuery's .get() method.
                    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

                    var barChartData = {
      labels  : {!!json_encode($Chart->labels)!!},
      datasets: [
        {
          label               : 'Jumlah Rapat',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!!json_encode($Chart->dataset)!!}
        },
      ]
    }

    var barChartData2 = {
      labels  : {!!json_encode($Chart2->labels)!!},
      datasets: [
        {
          label               : 'Tempat Rapat',
          backgroundColor     : 'rgba(24,162,184,1)',
          borderColor         : 'rgba(24,162,184,1)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(24,162,184,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(24,162,184,1)',
          data                : {!!json_encode($Chart2->dataset)!!}
        },
      ]
    }

                    //------------- 
                    //- BAR CHART -
                    //-------------
                    var barChartCanvas = $('#barChart').get(0).getContext('2d')
                    var barChartCanvas3 = $('#barChart3').get(0).getContext('2d')

                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false,
                        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 },
                }
            }]
        }
                    }

                    new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        options: barChartOptions,
                    })
                    new Chart(barChartCanvas3, {
                        type: 'bar',
                        data: barChartData2,
                        options: barChartOptions
                    })
                })
            </script>

            @guest
                                            {{-- <form></form>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Data Rapat</h3>
                </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                                                        <form action="{{ url('/dashboard') }}" method="GET">
                            <div class="input-group input-group-lg">


                                <input name="keyword" type="text" class="form-control form-control-lg"
                                    placeholder="Nama Rapats" value="{{ $keyword }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                            </div>
                                                        </form>
                    </div>
                </div>
            </div>
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Rapat</th>
                            <th>Tanggal Rapat</th>
                            <th>Tempat Rapat</th>
                            <th>Jumlah Peserta</th>
                            <th>PIC Bagian</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($Rapat as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_rapat }}</td>
                                <td>{{ $data->tanggal_rapat }}</td>
                                <td>{{ $data->tempat_rapat }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->pic }}</td>
                                <td align="center"><a href="https://api.whatsapp.com/send?phone={{ $data->telepon }}"
                                        class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>


            </div> --}}

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Data Rapat</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                            <th>Nama Rapat</th>
                            <th>Tanggal Rapat</th>
                            <th>Tempat Rapat</th>
                            <th>Jumlah Peserta</th>
                            <th>PIC Bagian</th>
                            <th>Dokumen</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                        @foreach ($Rapat as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_rapat }}</td>
                                <td>{{ $data->tanggal_rapat }}</td>
                                <td>{{ $data->tempat_rapat }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->pic }}</td>
                                <td align="center"><a href="https://api.whatsapp.com/send?phone={{ $data->telepon }}"
                                        class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></a></td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        @endguest
            <!-- /.card -->

    </section>
@endsection
