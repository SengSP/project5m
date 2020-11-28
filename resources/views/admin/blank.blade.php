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

        </div>
      </div>
    </div>
  </div>
@include('admin/partials/footer')

@else
    <meta http-equiv="refresh" content="1; url={{ url('login') }}">
@endif