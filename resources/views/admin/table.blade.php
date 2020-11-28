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
                <div class="w3-row">
                    <div class="w3-col m8 w3-padding">
                        <h4 class="w3-center">ລາຍການໂຕະ</h4>
                        <div class="w3-responsive">
                            <table class="w3-table-all">
                                <thead>
                                    <tr style="background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
                                        <th class="w3-center">ລະຫັດໂຕະ</th>
                                        <th class="w3-center">ຊື່ໂຕະ</th>
                                        <th class="w3-center">ແກ້ໄຂ</th>
                                        <th class="w3-center">ລົບ</th>
                                    </tr>
                                </thead>
                                <tbody id="showtable">
                                    
                                </tbody>
                                <tfoot>
                                    <td colspan="3" class="w3-right-align">ຈຳນວນໂຕະ</td>
                                    <td class="w3-center"><b id="showrow"></b></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="w3-col m4 w3-padding">
                        <h4 class="w3-center" id="title">ເພີ່ມໂຕະ</h4>
                        <label class="w3-large" for="tbname">ຊື່ໂຕະ</label>
                        <input type="hidden" name="tbid" id="tbid" value="">
                        <input type="text" class="w3-input" name="tbname" id="tbname" value="" placeholder="ໃສ່ຊື່ໂຕະ...">
                        <div class="w3-padding w3-center">
                            <button class="w3-button w3-blue" type="button" id="btnInsert" disabled><i class="fa fa-plus"></i> ເພີ່ມໂຕະ</button>
                            <button class="w3-button w3-green" type="button" id="btnUpdate" style="display: none"><i class="fa fa-pencil-square-o"></i> ແກ້ໄຂ</button>
                            <button class="w3-button w3-red" type="button" id="btnCancel" style="display: none"><i class="fa"></i> ຍົກເລີກ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@include('admin/partials/footer')
<script src="{{ url('w3theme/js/tables.js') }}"></script>
@else
    <meta http-equiv="refresh" content="1; url={{ url('login') }}">
@endif