$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
        }
    });
    $('body').on('keyup', '#tbname', function(){
        var tbname = $(this).val();
        if(tbname === ""){
            $('#btnInsert').prop('disabled', true);
            $('#btnUpdate').prop('disabled', true);
        }else{
            $('#btnInsert').prop('disabled', false);
            $('#btnUpdate').prop('disabled', false);
        }
    });
    // function load tables data to show on table
    loadTables();
    function loadTables(){
        $.ajax({
            url: "/loadTables",
            type: 'GET',
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $('#showtable').html(data.result);
                $('#showrow').html(data.count);
            }, error: function(data){
                console.log('Error: '+data);
            }
        })
    }

    // function insert new table
    $('body').on('click', '#btnInsert', function(){
        var tbname = $('#tbname').val();
        $.ajax({
            url: "/insertTale",
            type: 'POST',
            data: {tbname:tbname},
            dataType: 'json',
            success: function(data){
                loadTables();
                fnAlert(title='ສຳເລັດ', message=data, icon='success');
                $('#tbname').val("");
            }, error: function(data){
                console.log('Error: '+data);
            }
        })
    });

    // function get data to edit form
    $('body').on('click', '#btnEdit', function(){
        var tbid = $(this).val();
        $.ajax({
            url: "/getTableEdit",
            type: 'POST',
            data: {tbid:tbid},
            dataType: 'json',
            success: function(data){
                $('#tbid').val(data.id);
                $('#tbname').val(data.tbname);
                $('#btnInsert').hide();
                $('#btnUpdate').show();
                $('#btnCancel').show();
            }, error: function(data){
                console.log('Error: '+data);
            }
        })
    });
    // function update data
    $('body').on('click', '#btnUpdate', function(){
        var tbid = $('#tbid').val();
        var tbname = $('#tbname').val();
        // alert(tbid + ' ' + tbname);
        $.ajax({
            url: "/updateTable",
            type: 'POST',
            data: {tbid:tbid,tbname:tbname},
            dataType: 'json',
            success: function(data){
                loadTables();
                fnAlert(title='ສຳເລັດ', message=data, icon='success');
                $('#tbid').val("");
                $('#tbname').val("");
                $('#btnUpdate').hide();
                $('#btnCancel').hide();
                $('#btnInsert').show();
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    });

    // function delete table data
    $('body').on('click', '#btnDel', function(){
        var tbid = $(this).val();
        $.ajax({
            url: "/deleteTable",
            type: 'POST',
            data: {tbid:tbid},
            dataType: 'json',
            success: function(data){
                loadTables();
                fnAlert(title='ສຳເລັດ', message=data, icon='success');
                $('#tbid').val("");
                $('#tbname').val("");
                $('#btnUpdate').hide();
                $('#btnCancel').hide();
                $('#btnInsert').show();
            }, error: function(data){
                console.log('Error: '+data);
            }
        })
    });

    $('body').on('click', '#btnCancel', function(){
        $('#tbname').val("");
        $('#btnUpdate').hide();
        $('#btnCancel').hide();
        $('#btnInsert').show();
    });
    // function alert
    function fnAlert(title='', message='', icon=''){
        swal({
            title: title,
            text: message,
            icon: icon,
            button: false,
            timer: 3000
        });
    }
});