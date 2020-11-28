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
      <div class="w3-col m8">
        <div id="barchart" style="height: 300px; width: 100%;"></div>
      </div>
      <div class="w3-col m4">
        <div id="piechart" style="height: 300px; width: 100%;"></div>
      </div>
    </div>
    <div class="row">
      <div class="w3-col m2">&nbsp;</div>
      <div class="w3-col m8 w3-center">
        <div id="calendar"></div>
      </div>
    </div>
  </div>
@include('admin/partials/footer')
<script type="text/javascript" src="{{ url('w3theme/js/chart.js') }}"></script>
@else
    <meta http-equiv="refresh" content="1; url={{ url('login') }}">
@endif