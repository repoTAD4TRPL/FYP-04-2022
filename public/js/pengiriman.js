function reloadTableTransportasi() {
    var table = $('#table_transportasi').DataTable();

    $.ajax({
        url: "/api/transportasi",
        method: 'GET',
        data: 'json',
        success: function (response) {
            table.destroy();
            $('#table_transportasi').dataTable({
                "pageLength": 10,
                "data": response,

                columns: [
                    {
                        'data': 'id', render: function (data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    { 'data': 'transportasi' },

                ]
            });
        }
    });
}

$('#loketModal').on('show.bs.modal', function (e) {
    reloadOptionTransportasi();
  });
function reloadOptionTransportasi() {
    var table = $('#table_loket').DataTable();
    
        $.ajax({
            url: "/api/transportasi",
            method: 'GET',
            data: 'json',
            success: function (response) {
                for (var i = 0; i < response.length; i++){
                    $('#selectId').append(`<option value="${response[i].id}">${response[i].transportasi}</option>`);
                }
            }
        });
    }
    $('#stransportasi').append($('<option>', {
        value: 1,
        text: 'One'
    }));
function reloadTableLoket() {
    var table = $('#table_loket').DataTable();
    
        $.ajax({
            url: "/api/loket",
            method: 'GET',
            data: 'json',
            success: function (response) {
                table.destroy();
                $('#table_loket').dataTable({
                    "pageLength": 10,
                    "data": response,
                  
                    columns: [
                        {'data': 'id', render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }},
                        {'data': 'transportasi'},
                        {'data': 'nama_loket'},
                        {'data': 'ongkir'},
                    ]
                });
            }
        });
    }
    
$(document).ready(function () {
    reloadTableTransportasi();
    reloadTableLoket();
});
function submitTransportasi() {


    $.ajax({
        type: 'POST',
        url: "/api/transportasi",
        type: "POST",
        data: JSON.stringify(transportasi),
        data: {
            transportasi: $('#transportasi').val(),
        },
        success: function (response) {
            console.log(response);
            reloadTableTransportasi();
        },
        error: function (err) {
            alert(err);
            errorMessage("Gagal Menambahkan Data Transportasi");
        }
    });

}
function submitLoket() {


    $.ajax({
        type: 'POST',
        url: "/api/loket",
        type: "POST",
        data: JSON.stringify(loket),
        data: {
            nama_loket:  $('#loket').val(),
            id_transportasi: $('#selectId').val(),
        },
        success: function (response) {
            console.log(JSON.stringify(response));
            reloadTableLoket();
        },
        error: function (err) {
            alert(err);
            console.log(JSON.stringify($('#stransportasi').val()));
            errorMessage("Gagal Menambahkan Data Transportasi");
        }
    });

}

