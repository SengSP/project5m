<!DOCTYPE html>
<html>
<title>{{ $pagename }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ url('w3theme/css/w3.css') }}">
<link rel="stylesheet" href="{{ url('Calendar/css/fullcalendar.min.css') }}">
<script src="{{ url('w3theme/js/jquery.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
<script src="{{ url('w3theme/js/apexcharts.js') }}"></script>
<script src="{{ url('Calendar/js/moment.min.js') }}"></script>
<script src="{{ url('Calendar/js/fullcalendar.min.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ url('w3theme/js/sweetalert.min.js') }}"></script>
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Phetsarath OT"}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: -webkit-linear-gradient(left,#CFF4D2,#7BE495);}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 0px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="">