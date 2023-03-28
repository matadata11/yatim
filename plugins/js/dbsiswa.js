$(function (){
    tampil_database_siswa();   //pemanggilan fungsi tampil barang.
     
    $('#mydata').dataTable();
      
    //fungsi tampil barang
    function tampil_database_siswa(){
        $.ajax({
            type  : 'ajax',
            url   : '<?=site_url();?>/admin/Database_siswa/dbsiswa',
            // url  : '<?php echo base_url()?>/admin/Database_siswa/dbsiswa',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+data[i].nama+'</td>'+
                            '<td>'+data[i].nama+'</td>'+
                            // '<td>'+data[i].barang_nama+'</td>'+
                            // '<td>'+data[i].barang_harga+'</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

});