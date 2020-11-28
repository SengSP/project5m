$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // function get data to show in table
    loadFood();
    function loadFood(query=''){
        $.ajax({
            url: '/foodlist',
            type: 'GET',
            data: {query:query},
            dataType: 'json',
            success: function(data){
                $('#showfood').html(data.showfood);
                // console.log(data.showfood);
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    }

    // select type to show list
    $('body').on('change', '#type', function(){
        var query = $(this).val();
        loadFood(query);
    });

    $('body').on('click', '#btnImage', function(){
        var photoname = $(this).val();
        var id = $('#id').val();
        $('#fid').val(id);
        $('#showimg').attr('src', 'foodimg/'+photoname);
        $('#modalImage').show();
    });

    function showaimg(input){
        if(input.files && input.files){
            var reader = new FileReader;

            reader.onload = function(e){
            $('#showimg').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fimage").change(function(){
        $('#showimg').show();
        showaimg(this);
    });

    // function edit image
    $('#formUpload').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: "/editFoodimg",
            method: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                // console.log(data);
                fnAlert(title='ສຳເລັດ', message=data, icon='success');
                loadFood();
                $('#modalImage').hide();
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    });

    // function show modal for edit food data
    $('body').on('click', '#btnEdit', function(){
        var fid = $(this).val();
        $.ajax({
            url: "/loadEditdata",
            type: 'POST',
            data: {fid:fid},
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $('#editfid').val(data.fid);
                $('#name').val(data.name);
                $('#price').val(data.price);
                $('#tid option[value="'+data.tid+'"]').prop('selected', true);
                $('#modalEdit').show();
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    });

    // function update data
    $('body').on('click', '#btnUpdate', function(){
        var fid = $('#editfid').val();
        var name = $('#name').val();
        var price = $('#price').val();
        var tid = $('#tid').val();
        var query = tid;
        $.ajax({
            url: "/editFooddata",
            type: 'POST',
            data: {fid:fid,name:name,price:price,tid:tid},
            dataType: 'json',
            success: function(data){
                fnAlert(title='ສຳເລັດ', message=data, icon='success');
                loadFood(query);
                $('#modalEdit').hide();
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    });

    // function delete data
    $('body').on('click', '#btnDel', function(){
        var fid = $(this).val();
        $.ajax({
            url: "/deleteFood",
            type: 'POST',
            data: {fid:fid},
            dataType: 'json',
            success: function(data){
                // console.log(data);
                fnAlert(title='ສຳເລັດ', message=data, icon='success');
                loadFood();
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    });

    // function alert
    function fnAlert(title='', message='', icon=''){
        swal({
            title: title,
            text: message,
            icon: icon,
            button: false,
            timer: 2500
        });
    }
});