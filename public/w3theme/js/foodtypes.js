$(document).ready(function(){
    // function load food type
    loadType();
    function loadType(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'loadType',
            type: 'GET',
            dataType: 'json',
            success: function(data){
                $('#showtype').html(data.typedata);
                // console.log('Result: '+data);
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    }

    // function add food type
    $('body').on('click', '#btnAdd', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if($('#tname').val() == ""){
            fnAlert(title='ຜິດພາດ', message='ກະລຸນາກວດຄືນມີຄ່າຫວ່າງບໍ່?', icon='error');
        }else{
            var datat = {
                tname: $('#tname').val()
            };
            $.ajax({
                url: 'insertType',
                type: 'POST',
                data: datat,
                dataType: 'json',
                success: function(data){
                    fnAlert(title='ສຳເລັດ', message='ການດຳເນີນການສຳເລັດ', icon='success');
                    loadType();
                    $('#modaladd').hide();
                    // console.log(data);
                }, error: function(data){
                    console.log('Error: '+data);
                }
            });
        }
    });

    // function get data to edit form
    $('body').on('click', '#btnEdit', function(){
        var tid = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/getType/'+tid,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                // console.log('Result:'+data.id+' name:'+data.name);
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#modaledit').show();
            }, error: function(data){
                console.log('Error: '+ data);
            }
        })
    });

    // function update food type
    $('body').on('click', '#btnUpdate', function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var updatedata = {
            tname: $('#name').val()
        };
        $.ajax({
            url: 'updateType/'+$('#id').val(),
            type: 'POST',
            data: updatedata,
            dataType: 'json',
            success: function(data){
                $('#modaledit').hide();
                fnAlert(title='ສຳເລັດ', message='ການແກ້ໄຂຂໍ້ມູນສຳເລັດ', icon='success');
                loadType();
                // console.log('result: '+ data.id);
            }, error: function(data){
                console.log('Error: '+data);
            }
        });
    });

    /// function delete food type
    $('body').on('click', '#btnDel', function(){
        var tid = $(this).val();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
            }
        });
        swal({
            title: "ທ່ານຕ້ອງການລຶບແທ້ບໍ່?",
            text: "ກົດຕົກລົງເພື່ອລຶບ, ກົດພື້ນທີ່ຫວ່າງເພື່ອຍົກເລີກ",
            icon: "warning",
            buttons: 'ຕົກລົງ',
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '/deleteType/'+tid,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        swal("ການລຶບສຳເລັດ!", {
                            icon: "success",
                            button: false,
                            timer: 2000
                        });
                        loadType();
                    }, error: function(data){
                        console.log('Error: '+ data);
                    }
                });
            } else {
              swal("ການລຶບຖືກຍົກເລີກ!", {
                  icon: "error",
                  button: false,
                  timer: 2000
              });
            }
          });
    });

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