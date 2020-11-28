<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center" id="idside" style="display:none">
    <!-- Avatar image in top left corner -->
    <img src="{{ url('/images/admin.png') }}" style="width:50%">
    <label class="w3-xlarge">{{ Auth::user()->name }}</label>
    <a href="{{ url('admin') }}" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-home w3-xxlarge"></i>
      <h5>ໜ້າຫຼັກ</h5>
    </a>
    <a href="{{ url('foods') }}" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-cutlery w3-xxlarge"></i>
      <h5>ອາຫານ</h5>
    </a>
    <a href="{{ url('types') }}" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-cutlery w3-xxlarge"></i>
      <h6>ປະເພດອາຫານ</h6>
    </a>
    <a href="{{ url('tables') }}" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-list w3-xxlarge"></i>
      <h5>ໂຕະ</h5>
    </a>
    <a href="#photos" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-file-text-o w3-xxlarge"></i>
      <h5>ລາຍຮັບ</h5>
    </a>
    <a href="#photos" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-shopping-basket w3-xxlarge"></i>
      <h5>ລາຍການສັ່ງຊື້</h5>
    </a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-user-circle w3-xxlarge"></i>
      <h5>ຜູ້ໃຊ້</h5>
    </a>
    <a href="{{ url('logout') }}" class="w3-bar-item w3-button w3-padding w3-hover-orange">
      <i class="fa fa-sign-out w3-xxlarge"></i>
      <h5>ອອກລະບົບ</h5>
    </a>
  </nav>
  <div class="" style="margin-left:0px;background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)" id="idnav">
      <button class="w3-button w3-xlarge w3-left w3-hide-small" id="btnMenu" onclick="myMenu()">&#9776;</button>
      <button class="w3-button w3-xlarge w3-left w3-hide-medium w3-hide-large" id="btnBar" onclick="myFunction()">&#9776;</button>
      <div class="w3-center"><label class="w3-xxlarge w3-hide-medium w3-hide-large">Shop Name</label></div>
      <div class="w3-center"><label class="w3-xxlarge w3-hide-small">{{ $pagename }}</label></div>
      <div class="w3-container">
          {{-- <h1>My Page</h1> --}}
      </div>
  </div>
  <!-- Navbar on small screens (Hidden on medium and large screens) -->
  <div id="navDemo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-left:0px;margin-top:46px;background: -webkit-linear-gradient(right,#CFF4D2,#7BE495)">
      <a href="{{ url('admin') }}" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-home"></i> ໜ້າຫຼັກ</a>
      <a href="{{ url('foods') }}" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-cutlery"></i> ອາຫານ</a>
      <a href="{{ url('types') }}" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-cutlery"></i> ປະເພດອາຫານ</a>
      <a href="{{ url('tables') }}" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-list"></i> ໂຕະ</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-file-text-o"></i> ລາຍຮັບ</a>
      <a href="#contact" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-shopping-basket"></i> ລາຍການສັ່ງຊື້</a>
      <a href="#contact" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-user-circle"></i> ຜູ້ໃຊ້</a>
      <a href="{{ url('logout') }}" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-sign-out"></i> ອອກລະບົບ</a>
  </div>