@extends('layouts.admin')

@section('content')
      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">History Tangkapan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-sm-4">
            <div class="card card-secondary mb-0">
              <div class="card-header">
                <h3 class="card-title">History Tangkapan</h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                <label>Tanggal Awal:</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text">
                      <i class="fa fa-calendar">    
                      </i>
                  </div>
                      </span>
                    </div>
                    <input type="date" class="form-control float-right" id="TAwal">
                  </div>
                  <br>
                  <div class="form-group">
                <label>Tanggal Akhir:</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text">
                      <i class="fa fa-calendar">    
                      </i>
                  </div>
                      </span>
                    </div>
                    <input type="date" class="form-control float-right" id="TAkhir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSpentBudget">Total Tangkapan(Kg)</label>
                  <input type="text" class="form-control" placeholder="Tangkapan Per/Minggu ..." id="TTangkapan">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-default float-right" onclick="submitHistory()">Submit</button>
                </div>
              </div>
            </div>
          </div><!-- /.container-fluid -->
          
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
              <select name="bln" id="bln" class="form-control">
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">March</option>
                <option value="4">Aprl</option>
                <option value="5">Mei</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Okt</option>
                <option value="11">Nov</option>
                <option value="12">Sep</option>
              </select>
              <div class="inner">
                <p>Rata - Rata Tangkapan (Kg)</p>
                <h1 id="rata2">0</h1>
              </div>
            </div>
          </div>
        </div>
    </section>
    <br>
    <br>
    <div class="card ml-2 mr-2">
      <div class="card-header">
        <h3 class="card-title">Tabel Tangkapan</h3>
      </div>
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
              <table id="table_id" class="display" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th>Total Tangkapan (Kg)</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
            </div>
          </div>
          <div class="row">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')
<script src="{{ asset('/js/historyTangkapan.js') }}"></script>
@endsection