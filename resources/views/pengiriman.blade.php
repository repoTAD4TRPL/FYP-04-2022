@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengiriman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengiriman</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-5">
                        <h3 class="mb-2 row">Transportasi</h3>
                        <table id="table_transportasi" class="display" class="table table-striped row">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Transportasi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-success mt-5 mb-2" style="width: 150px;" data-toggle="modal"
                                data-target="#exampleModal">Tambah</button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <h3 class="mb-2 row">Loket</h3>
                        <table id="table_loket" class="display" class="table table-striped row" style="width: 100%;" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Transportasi</th>
                                    <th>Nama Loket</th>
                                    <th>Ongkir</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-success mt-5 mb-2" style="width: 150px;" data-toggle="modal"
                                data-target="#loketModal">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transportasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <input type="text" class="form-control" id="transportasi" placeholder="Transportasi">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitTransportasi()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loketModal" tabindex="-1" role="dialog" aria-labelledby="loketModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loketModalLabel">Tambah Loket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <label for="loket">Loket</label>
                            <input type="text" class="form-control" id="loket" placeholder="">
                        </div>
                        <br>
                        <div class="row">
                            <label for="selectId">Transportasi</label>
                            <select class="form-control" id="selectId">
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <label for="loket">Ongkos Pengiriman</label>
                            <input type="text" class="form-control" id="loket" placeholder="">
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitLoket()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('/js/pengiriman.js') }}"></script>
@endsection
