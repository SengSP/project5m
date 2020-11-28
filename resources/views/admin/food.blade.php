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
          <div class="w3-row w3-padding">
            <div class="w3-col m3">&nbsp;</div>
            <div class="w3-col m3 w3-padding">
              <select class="w3-select" name="type" id="type">
                @if (count($types) > 0)
                  <option value="">ເລືອກປະເພດອາຫານ</option>
                  @foreach ($types as $type)
                    <option value="{{ $type->tid }}">{{ $type->tname }}</option>           
                  @endforeach
                @else
                  <option value="">ຍັງບໍ່ມີຂໍ້ມູນປະເພດອາຫານ</option>     
                @endif
              </select>
            </div>
            <div class="w3-col m3 w3-padding">
              <a href="{{ url('addfood') }}" class="w3-btn w3-blue"><i class="fa fa-plus"></i> ເພີ່ມລາຍການອາຫານ</a>
            </div>
          </div>
          <div class="w3-responsive">
            <table class="w3-table-all">
                <thead>
                    <tr style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
                        <th class="w3-center">ລະຫັດ</th>
                        <th class="w3-center">ຊື່ອາຫານ</th>
                        <th class="w3-center">ລາຄາ</th>
                        <th class="w3-center">ຮູບພາບ</th>
                        <th class="w3-center">ຈັດການ</th>
                    </tr>
                </thead>
                <tbody id="showfood">
                    
                </tbody>
            </table>
          </div>
          <div id="modalImage" class="w3-modal">
            <form class="w3-modal-content w3-animate-zoom w3-card-4" method="POST" id="formUpload" enctype="multipart/form-data">
              {{ csrf_field() }}
              <header class="w3-container" style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)"> 
                <span onclick="document.getElementById('modalImage').style.display='none'" 
                class="w3-button w3-red w3-display-topright">&times;</span>
                <h2>ແກ້ໄຂຮູບພາບ</h2>
              </header>
              <div class="w3-container">
                <div class="w3-row w3-padding">
                  <div class="w3-col m2">&nbsp;</div>
                  <div class="w3-col m8">
                    <label class="w3-large" for="name">ຮູບພາບເກົ່າ</label>
                    <img src="" id="showimg" class="w3-image">
                    <label class="w3-large" for="name">ເລືອກຮູບພາບໃໝ່</label>
                    <input type="hidden" name="fid" id="fid" value="">
                    <input type="file" class="w3-input" name="fimage" id="fimage" required>
                  </div>
                </div>
              </div>
              <footer class="w3-container w3-center w3-padding" style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
                <button type="submit" class="w3-button w3-blue w3-round"><i class="fa fa-pencil"></i> ແກ້ໄຂຮູບພາບ</button>
                <button type="button" class="w3-button w3-red w3-round" onclick="document.getElementById('modalImage').style.display='none'">
                  <i class="fa fa-window-close"></i> ຍົກເລີກ
                </button>
              </footer>
            </form>
          </div>
          <div id="modalEdit" class="w3-modal">
            <form class="w3-modal-content w3-animate-zoom w3-card-4">
              <header class="w3-container" style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)"> 
                <span onclick="document.getElementById('modalEdit').style.display='none'" 
                class="w3-button w3-red w3-display-topright">&times;</span>
                <h2>ແກ້ໄຂຂໍ້ມູນອາຫານ</h2>
              </header>
              <div class="w3-container">
                <div class="w3-row w3-padding">
                  <div class="w3-col m2">&nbsp;</div>
                  <div class="w3-col m8">
                    <label class="w3-large" for="name">ຊື່ອາຫານ</label>
                    <input type="hidden" name="editfid" id="editfid" value="">
                    <input type="text" class="w3-input" name="name" id="name" placeholder="ປ້ອນຊື່ອາຫານ..." required>
                    <label for="price" class="w3-large">ລາຄາ</label>
                    <input type="number" class="w3-input" name="price" id="price" placeholder="ປ້ອນລາຄາ..." required>
                    <label for="tid" class="w3-large">ປະເພດອາຫານ</label>
                    <select class="w3-select" name="tid" id="tid">
                    @if (count($types) > 0)
                      @foreach ($types as $tp)
                          <option value="{{ $tp->tid }}">{{ $tp->tname }}</option>
                      @endforeach
                    @else
                        <option value="">ຍັງບໍ່ມີຂໍ້ມູນປະເພດອາຫານ</option>
                    @endif
                    </select>
                  </div>
                </div>
              </div>
              <footer class="w3-container w3-center w3-padding" style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
                <button type="button" class="w3-button w3-blue w3-round" id="btnUpdate"><i class="fa fa-pencil"></i> ແກ້ໄຂຂໍ້ມູນອາຫານ</button>
                <button type="button" class="w3-button w3-red w3-round" onclick="document.getElementById('modalEdit').style.display='none'">
                  <i class="fa fa-window-close"></i> ຍົກເລີກ
                </button>
              </footer>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('admin/partials/footer')
<script type="text/javascript" src="{{ url('w3theme/js/foods.js') }}"></script>

@else
    <meta http-equiv="refresh" content="1; url={{ url('login') }}">
@endif