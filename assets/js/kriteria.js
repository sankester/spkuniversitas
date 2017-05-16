/**
 * Created by sankester on 13/05/2017.
 */


function edit_kriteria(id){

    $('#formKriteria')[0].reset();
    $('#errors').empty();
    $('#errors').removeClass("alert");

    $.ajax({
        url : base_url + "kriteria/" + "getById/" + id,
        type : "GET",
        dataType: "JSON",
        success : function(data){
            $('[name="kdKriteria"]').val(data.kdKriteria);
            $('[name="kriteria"]').val(data.kriteria);

            if(data.sifat == 'B'){
                $('#benefit').prop('checked', true);
            }else{
                $('#cost').prop('checked', true);
            }

            $('[name="bobot"]').val(data.bobot);

            $('#form_kriteria').modal('show');
            $('.modal-title').text('Update Kriteria');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}

function save_kriteria() {
    var url;
    url =  base_url + "kriteria/"+ "updateKriteria";

    $('#errors').empty();
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formKriteria').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            //if success close modal and reload ajax table
            if(data.valid == false){
                for (i in data) {
                    $('#errors').addClass("alert alert-danger alert-dismissable");
                    if(i !='valid'){
                        $('.alert').prepend("<p>"+data[i]+"</p>");
                    }
                }
            } else {
                $('#modal_form').modal('hide');
                location.reload();// for reload a page
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');

        }
    });
}

function edit_item_kriteria(id){
    $('.modal-item-kriteria').css('width', '70%');
    $('.modal-item-kriteria').css('margin', '100px auto 100px auto');


    $('#formItemKriteria')[0].reset();
    $('#errors').empty();
    $('#errors').removeClass("alert");

    $.ajax({
        url : base_url + "kriteria/" + "getSubById/" + id,
        type : "GET",
        dataType: "JSON",
        success : function(data){
            $('[name="kdKriteria"]').val(data.kode);
            for(var item in data.param){
                var index = parseInt(item) + 1;
                var itemkriteria = 'itemKriteria' + index;
                var valueKriteria = 'value' + index;
                var kdSubKriteria = 'kdSubKriteria' + index;
                $("input[name=" + kdSubKriteria + "]").val(data.param[item].kdSubKriteria);
                $("input[name=" + itemkriteria + "]").val(data.param[item].subKriteria);
                $("input[name=" + valueKriteria + "]").val(data.param[item].value);
            }

            $('#form_item_kriteria').modal('show');
            $('.modal-title').text('Update Item Kriteria');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}

function save_item_kriteria() {
    var url;
    url =  base_url + "kriteria/"+ "updateSubKriteria";

    $('#errors').empty();

     //ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formItemKriteria').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            //if success close modal and reload ajax table
            if(data.valid == false){
                for (i in data) {
                    $('#errors').addClass("alert alert-danger alert-dismissable");
                    if(i !='valid'){
                        $('.alert').prepend("<p>"+data[i]+"</p>");
                    }
                }
            } else {
                $('#modal_form').modal('hide');
                location.reload();// for reload a page
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}

function hapus_kriteria(id){
        $.ajax({
            url :  base_url + "kriteria/" + "delete/"+id,
            type : "POST",
            dataType : "JSON",
            success : function(data){
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
}

function lihat_kriteria(id){
    $('.view-detail-kriteria').css('width', '50%');
    $('.view-detail-kriteria').css('margin', '100px auto 100px auto');

    $('#viewKodeKriteria').text("");
    $('#viewKriteria').text("");
    $('#viewSifat').text("");
    $('#viewBobot').text("");

    for(var i=1; i<=5; i++){
        var itemkriteria = 'viewItemKriteria' + i;
        var valueKriteria = 'viewValue' + i;

        $("#" + itemkriteria ).text("");
        $("#" + valueKriteria ).text("");
    }

    $.ajax({
        url: base_url + "kriteria/" + "detail/"+id,
        type : "POST",
        dataType : "JSON",
        success:  function(data){

            $('#viewKodeKriteria').text(' : '+ data.kriteria.kdKriteria);
            $('#viewKriteria').text(' : '+data.kriteria.kriteria);
            $('#viewSifat').text(' : '+data.kriteria.sifat);
            $('#viewBobot').text(' : '+data.kriteria.bobot);

            for(var item in data.subkriteria){
                var index = parseInt(item) + 1;
                var itemkriteria = 'viewItemKriteria' + index;
                var valueKriteria = 'viewValue' + index;

                $("#" + itemkriteria ).text(data.subkriteria[item].subKriteria);
                $("#" + valueKriteria ).text(data.subkriteria[item].value);


            }
            $('#view_kriteria').modal('show');
            $('#view_kriteria .modal-title').text('Detail Kriteria');
        }
    });
}

