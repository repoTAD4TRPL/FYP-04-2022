@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaksi Pending</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                            </div>
                            <div class="col-sm-12 col-md-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                    aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nama</th>
                                            <th>No.Telp</th>
                                            <th>Transportasi</th>
                                            <th>Loket</th>
                                            <th>Status</th>
                                            <th style="width: 140px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        $i =1;
                                        ?>
                                        @foreach ($listpanding as $data)
                                            <tr>

                                                <td>{{$i++ }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->phone }}</td>
                                                <td>{{ $data->transportasi }}</td>
                                                <td>{{ $data->nama_loket }}</td>
                                                <td>{{ $data->status }}</td>
                                                <td>
                                                    <a href="{{ route('transaksibatal', $data->id) }}">
                                                        <button type="button"
                                                            class="btn btn-block btn-danger btn-xs">Batal</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                       
                    </div>
                </div>
            </div>

            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi Selesai/Batal</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                    </div>
                                    <div class="col-sm-12 col-md-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                            class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Nama</th>
                                                    <th>No.Telp</th>
                                                    <th>Transportasi</th>
                                                    <th>Loket</th>
                                                    <th>Jumlah Transaksi</th>
                                                    <th>Status</th>
                                                    <th>Bukti Transfer</th>
                                                    <th style="width: 140px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                                $i2 = 1;
                                                ?>
                                                @foreach ($listselesai as $data)
                                                    <tr>
                                                        <td>{{$i2++ }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->phone }}</td>
                                                        <td>{{ $data->transportasi }}</td>
                                                        <td>{{ $data->nama_loket }}</td>
                                                        <td>{{ 'Rp.' . number_format($data->total_transfer) }}</td>
                                                        <td>{{ $data->status }}</td>
                                                        <td><a href="{{ asset('storage/transfer/' . $data->buktiTransfer) }}"
                                                                target="_blank">Lihat Bukti Transfer</a></td>
                                                        <td>

                                                            @if ($data->status == 'DIKIRIM')
                                                                <a href="{{ route('transaksiselesai', $data->id) }}">
                                                                    <button type="button"
                                                                        class="btn btn-block btn-primary btn-xs">Selesai</button>
                                                                </a>
                                                            @elseif($data->status == 'DIBAYAR')
                                                                <a href="{{ route('transaksikirim', $data->id) }}">
                                                                    <button type="button"
                                                                        class="btn btn-block btn-success btn-xs">Kirim</button>
                                                                </a>
                                                            @elseif($data->status == 'SELESAI' || $data->status == 'BATAL')
                                                                <a href="#">
                                                                    <button type="button"
                                                                        class="btn btn-block btn-warning btn-xs">Detail</button>
                                                                </a>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
