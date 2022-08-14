// $(document).ready(function () {
//     $('#table_id').DataTable( {
//         ajax: {
//             url: 'http://172.26.40.177:8000/api/history',
//             dataSrc : "produks",
//             method: 'GET',
//             type: 'json', 
            
//         },
        
        
        
        
//     }
    
//     );
    
// });
function reloadTable() {
var table = $('#table_id').DataTable();

    $.ajax({
        url: "/api/history",
        method: 'GET',
        data: 'json',
        success: function (response) {
            table.destroy();
            $('#table_id').dataTable({
                "pageLength": 10,
                "data": response,
              
                columns: [
                    {'data': 'id_tangkapan', render: function (data, type, row, meta) {
                            return meta.row + 1;
                        }},
                    {'data': 'tanggal_awal'},
                    {'data': 'tanggal_akhir'},
                    {'data': 'total_tangkapan'},
                   
                ]
            });
            var avg = 0;
            for (let i = 0; i < response.length; i++) {
                let result = response[i]['tanggal_awal'].substring(5,7);
                if($('#bln').val() == parseInt(result)){

                    avg = avg + parseInt(response[i]['total_tangkapan']);
                }
                }
                var num = Number(avg/response.length) // The Number() only visualizes the type and is not needed
                var roundedString = num.toFixed(2);
                var rounded = Number(roundedString);
                $('#rata2').html(rounded);
                

            
        }
    });
}
$(document).ready(function () {
    reloadTable();
});
$('#bln').on('change',(event) => {
    reloadTable();
});

function submitHistory(){
  
        
        $.ajax({
            type: 'POST',
            url: "/api/history",
            type:"POST",
            data: JSON.stringify(history),
            data : {
                tanggal_awal: $('#TAwal').val(),
                tanggal_akhir: $('#TAkhir').val(),
                total_tangkapan :  $('#TTangkapan').val()
            },
            success: function (response) {
                console.log(response);
                reloadTable();
            },
            error: function (err) {
                alert(err);
                errorMessage("Gagal Menambahkan Data History");
            }
        });
    
}