     <!-- Footer -->
    <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
    </footer>
    <!-- End footer -->
    
    <!-- END PAGE CONTENT -->
    </div>
    <script type="text/javascript">
        function myMenu() {
            var x = document.getElementById("idside");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                document.getElementById('idnav').style.marginLeft = '120px';
                document.getElementById('main').style.marginLeft = '120px';
            } else { 
                x.className = x.className.replace(" w3-show", "");
                document.getElementById('idnav').style.marginLeft = '0px';
                document.getElementById('main').style.marginLeft = '0px';
            }
        }
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else { 
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
    </body>
    </html>