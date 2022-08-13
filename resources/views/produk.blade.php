@extends('layouts.admin')

@section('content')
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Table Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
                <h3 class="card-title">Produk Table</h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add Produk</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Perkiraan Stok</th>
                      <th>Update At</th>
                      <th style="width: 40px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listUser as $data)

                        <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{"Rp.".number_format($data->harga)}}</td>
                        <td>{{ $data->stok }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <a href="javascript:void(0);" class="data_edit" data-item="{{ $data->id }}" data-toggle="modal" data-target="#edit_modal">
                                <i class="fa fa-edit blue" ></i>
                            </a>
                            |
                            <a href="javascript:void(0);" class="data_delete" data-id="{{$data->id}}" data-item="{{$data->id}}" data-toggle="modal" data-target="#delete">
                                <i class="fa fa-trash red"></i>
                            </a>
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
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Product </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="name">
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="Harga ..." name="harga">
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Perkiraan Stok</label>
                        <input type="text" class="form-control" placeholder="Perkiraan Stok ..." name="stok">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi ..." name="deskripsi"></textarea>
                      </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Foto/Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tambah </button>
                </div>
              </form>

                
              </div>
            </div>
          </div>


          <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Product </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form method="POST" action="{{ route('produk.edit') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" id="data_update_user" name="data_update_user" hidden>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" id="edt_name" placeholder="Nama" name="edit_name">
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" id="edt_harga" placeholder="Harga ..." name="edit_harga">
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Perkiraan Stok</label>
                        <input type="text" class="form-control" id="edt_stok" placeholder="Perkiraan Stok ..." name="edit_stok">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" id="edt_deskripsi" placeholder="Deskripsi ..." name="edit_deskripsi"></textarea>
                      </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Foto/Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="edit_gambar">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="btn_simpan" class="btn btn-primary">Save </button>
                </div>
              </form>

                
              </div>
            </div>
          </div>


          <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="addNewLabel">Hapus Product </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                  </button>
                </div>

                <form id="form_delete_produk" method="POST" action="{{ route('produk.delete')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="text" id="data_delete_user" name="data_delete_user" hidden>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="iddata" value="">
                    <p class="text-center">
                      Yakin Ingin Menghapus?
                    </p>
                  </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" id="btn_delete" class="btn btn-primary" data-dismiss="modal" 
                      onclick="document.getElementById('form_delete_produk').submit();">Yes, Delete</button>
                    </div>
                </form>
              </div>
            </div>
          </div>



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
<script>
  // $('#delete').on('show.bs.modal', function (event){
  //   var data = $(event.relatedTarget)
  //   var iddata = button.data('id')

  //   var modal = $(this)
  //   modal.find('.modal-body #iddata').val(iddata)

  //   $('#btn_delete').click(function (e){
  //     $.ajax({
  //       type : 'POST',
  //       dataType : 'json',
  //       url : '{{route('deleteProduct')}}',
  //       data : {'id': iddata},
  //       success: function (data){
  //         console.log(data)
  //         location.reload();
  //       }
  //     })
  //   })
  // })

  // $('#edit').on('show.bs.modal', function (event){
  //   var data = $(event.relatedTarget)
  //   var iddata = button.data('id')
  //   let mData = data.data('mdata')

  //   let edtName = document.getElementById("edt_name")
  //   let edtHarga = document.getElementById("edt_harga")
  //   let edtStok = document.getElementById("edt_stok")
  //   let edtDeskripsi = document.getElementById("edt_deskripsi")

  //   var modal = $(this)

  //   $('#edt_name').val(mData.name)
  //   $('#edt_harga').val(mData.harga)
  //   $('#edt_stok').val(mData.stok)
  //   $('#edt_deskripsi').val(mData.deskripsi)

    // modal.find('.modal-body #iddata').val(iddata)

    // $('#btn_simpan').click(function (e){

    //   // alert("Name:" +mData.name)

    //   $.ajax({
    //     type : 'POST',
    //     dataType : 'json',
    //     url : '{{route('editProduct')}}',
    //     data : {
    //       'id': mdata.id, 
    //       'name':edtName.value, 
    //       'harga':edtHarga.value, 
    //       'stok':edtStok.value,
    //       'deskripsi':edtDeskripsi.value,
    //     },
    //     success: function (data){
    //       console.log(data)
    //       location.reload();
    //     }
    //   })
    // })
  // })

  $(document).on("click", ".data_delete", function () {
    var itemid= $(this).attr('data-item');
    document.getElementById('data_delete_user').value = itemid
 });

 $(document).on("click", ".data_edit", function () {
    var itemid= $(this).attr('data-item');
    document.getElementById('data_update_user').value = itemid
 });

</script>

@endsection