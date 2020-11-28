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
                <p>
                    <button class="w3-button w3-blue" onclick="document.getElementById('modaladd').style.display='block'"><i class="fa fa-plus"></i></button>
                </p>
                <div class="w3-responsive">
                    <table class="w3-table-all">
                        <thead>
                            <tr style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
                                <th class="w3-center">ລຳດັບ</th>
                                <th class="w3-center">ຊື່ປະເພດອາຫານ</th>
                                <th class="w3-center">ຈັດການ</th>
                            </tr>
                        </thead>
                        <tbody id="showtype">
                            
                        </tbody>
                    </table>
                </div>
                <div id="modaladd" class="w3-modal">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-round-xlarge">
                        <header class="w3-container" style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
                            <span onclick="document.getElementById('modaladd').style.display='none'" 
                            class="w3-button w3-display-topright w3-xlarge w3-hover-red">&times;</span>
                            <h2 class="w3-center">ເພີ່ມປະເພດອາຫານ</h2>
                        </header>
                        <div class="w3-container w3-padding-16">
                            <p class="w3-col m3">&nbsp;</p>
                            <p class="w3-col m6">
                                <label for="tname" class="w3-large">ຊື່ປະເພດອາຫານ</label>
                                <input type="text" class="w3-input w3-round" name="tname" id="tname" placeholder=".......">
                            </p>
                            <p class="w3-col m3">&nbsp;</p>
                            <p class="w3-center w3-col m12">
                                <button type="button" class="w3-button w3-green w3-large w3-hover-blue" id="btnAdd">
                                    <i class="fa fa-plus"></i> ເພີ່ມປະເພດອາຫານ
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="modaledit" class="w3-modal">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-round-xlarge">
                        <header class="w3-container" style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
                            <span onclick="document.getElementById('modaledit').style.display='none'" 
                            class="w3-button w3-display-topright w3-xlarge w3-hover-red">&times;</span>
                            <h2 class="w3-center">ແກ້ໄຂປະເພດອາຫານ</h2>
                        </header>
                        <div class="w3-container w3-padding-16">
                            <p class="w3-col m3">&nbsp;</p>
                            <p class="w3-col m6">
                                <label for="tname" class="w3-large">ຊື່ປະເພດອາຫານ</label>
                                <input type="hidden" id="id" value="">
                                <input type="text" class="w3-input w3-round" name="name" id="name" placeholder=".......">
                            </p>
                            <p class="w3-col m3">&nbsp;</p>
                            <p class="w3-center w3-col m12">
                                <button type="button" class="w3-button w3-green w3-large w3-hover-blue" id="btnUpdate">
                                    <i class="fa fa-pencil"></i> ແກ້ໄຂປະເພດອາຫານ
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@include('admin/partials/footer')
<script type="text/javascript" src="{{ url('w3theme/js/foodtypes.js') }}"></script>

@else
    <meta http-equiv="refresh" content="1; url={{ url('login') }}">
@endif