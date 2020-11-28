@if(isset(Auth::user()->name) && isset(Auth::user()->password))
@include('admin/partials/head')
@include('admin/partials/navside')
<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  {{-- <header class="w3-container w3-padding-32 w3-center w3-blue" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> John Doe.</h1>
    <p>Photographer and Web Designer.</p>
  </header> --}}

  <div class="w3-container">
    <div class="w3-row">
        <div class="w3-col m12">
            <div class="w3-card-4 w3-light-gray w3-padding">
                @if (count($errors) > 0)
                    <div class="w3-panel w3-red">
                        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-right">&times;</span>
                        <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::get('success'))
                    <script>swal({
                        title: 'ສຳເລັດ',
                        text: 'ການດຳເນີນການສຳເລັດ',
                        icon: 'success',
                        button: false,
                        timer: 2500
                      });
                    </script>
                @endif
                <form class="w3-row w3-padding" action="{{ url('insertfood') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="w3-col m3">&nbsp;</div>
                    <div class="w3-col m6">
                        <label class="w3-large" for="name">ຊື່ອາຫານ</label>
                        <input type="text" class="w3-input" name="name" id="name" placeholder="..." required>
                        <label class="w3-large" for="price">ລາຄາ</label>
                        <input type="number" class="w3-input" name="price" id="price" placeholder="..." required>
                        <label class="w3-large" for="image">ຮູບພາບ</label>
                        <input type="file" class="w3-input" name="fimage" id="fimage" placeholder="..." required>
                        <img src="" id="showimg" alt="" class="w3-image" style="display: none">
                        <label class="w3-large" for="tid">ປະເພດອາຫານ</label>
                        <select name="tid" class="w3-select" id="tid">
                            @if (count($types) > 0)
                                <option value="">***** ເລືອກປະເພດອາຫານ *****</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->tid }}">{{ $type->tname }}</option>
                                @endforeach
                            @else
                                <option value="">ຍັງບໍ່ມີປະເພດອາຫານໃນລະບົບ</option>
                            @endif
                        </select>
                        <div class="w3-center w3-padding">
                            <button class="w3-button w3-green w3-round" type="submit"><i class="fa fa-plus"></i> ເພີ່ມອາຫານ</button>
                            <a class="w3-button w3-red w3-round" href="{{ url('foods') }}"><i class="fa fa-list"></i> ໄປໜ້າລາຍການ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@include('admin/partials/footer')
<script src="{{ url('w3theme/js/addfood.js') }}"></script>
@else
    <meta http-equiv="refresh" content="1; url={{ url('login') }}">
@endif