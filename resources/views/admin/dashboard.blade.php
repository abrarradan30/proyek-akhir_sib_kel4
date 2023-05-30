@extends('admin.layout.appadmin')

@section('content')

<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Kos : {{$data_kos}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/data_kos')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Data Pemilik Kos : {{$pemilik_kos}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/pemilik_kos')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Data Pelanggan : {{$pelanggan}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/pelanggan')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Data Pembayaran : {{$pembayaran}} </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/pembayaran')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> 
                            <br>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Data Riwayat Pembayaran : {{$riwayat_pesanan}} </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/riwayat_pesanan')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Data User : {{$user}} </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/user')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                <!-- paste pie    -->
                                <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart Role User
                                    </div>
                                    <div class="card-body"><canvas id="pieChartRole" width="100%" height="50"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                              <div class="card mb-4">
                                <div class="card-header">
                                  <i class="fas fa-chart-bar me-1"></i>
                                     Harga Kos
                                  </div>
                                  <div class="card-body"><canvas id="barChartHarga" widtHargah="100%" height="40"></canvas></div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                <!-- paste pie    -->
                                <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart Kabupaten/Kota
                                    </div>
                                    <div class="card-body"><canvas id="pieChartKabupatenKota" width="100%" height="50"></canvas></div>
                                </div>
                            </div>
                        </div>
<script>
var lbl_harga = [@foreach($ar_harga as $hrg) '{{$hrg->nama_kos}}',@endforeach ];
var hrg = [@foreach($ar_harga as $hrg) {{$hrg->harga}}, @endforeach ];
document.addEventListener("DOMContentLoaded", () => {
     new Chart (document.querySelector('#barChartHarga'), {
type: 'bar',
data: {
labels: lbl_harga,
datasets: [{
    label: "Revenue",
    backgroundColor: "rgba(2,117,216,1)",
    borderColor: "rgba(2,117,216,1)",
    data: hrg,
}],
},
options: {
    scales: {
        xAxes: [{
        time: {
        unit: 'month'
    },
    gridLines: {
        display: false
    },
    ticks: {
        maxTicksLimit: 6
    }
    }],
    yAxes: [{
        ticks: {
            min: 0,
            max: 3000000,
            maxTicksLimit: 5
        },
        gridLines: {
            display: true
        }
        }],
    },
    legend: {
        display: false
    }
}
});
});
</script>

<script>
var lbl_role = [@foreach ($ar_role as $role) '{{$role->role}}', @endforeach];
var jml_role = [@foreach ($ar_role as $role) {{$role->jumlah}}, @endforeach];
document.addEventListener("DOMContentLoaded", () => {
    new Chart(document.querySelector('#pieChartRole'), {
    type: 'pie',
  data: {
    labels: lbl_role,
    datasets: [{
      data: jml_role,
      backgroundColor: ['#32CD32', '#4169E1', '#00FF00', '#0000CD'],
    }],
  },
});
});
</script>

<script>
    var lbl_kabupaten_kota = [@foreach ($ar_kabupaten_kota as $kab) '{{$kab->kabupaten_kota}}', @endforeach];
    var jml_kabupaten_kota = [@foreach ($ar_kabupaten_kota as $kab) {{$kab->jumlah}}, @endforeach];
    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#pieChartKabupatenKota'), {
        type: 'pie',
      data: {
        labels: lbl_kabupaten_kota,
        datasets: [{
          data: jml_kabupaten_kota,
          backgroundColor: ['#32CD32', '#4169E1', '#00FF00', '#0000CD'],
        }],
      },
    });
    });
    </script>

@endsection