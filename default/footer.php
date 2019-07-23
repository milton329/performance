	
</div>



<!--<footer class="px-footer px-footer-bottom p-t-0" id="px-demo-footer">
    <div class="box m-a-0 bg-transparent">
      <div class="box-cell col-md-3 p-t-3">
        <h5 class="m-t-0 m-b-1 font-size-13">About Us</h5>
        <a href="#">Who we are</a><br>
        <a href="#">Jobs</a><br>
        <a href="#">Newsletters</a><br>
      </div>
      <div class="box-cell col-md-3 p-t-3">
        <h5 class="m-t-0 m-b-1 font-size-13">Help</h5>
        <a href="#">Support Center</a><br>
        <a href="#">Terms of Use</a><br>
        <a href="#">Privacy Policy</a><br>
      </div>	
      <div class="box-cell col-md-3 p-t-3">
        <h5 class="m-t-0 m-b-1 font-size-13">Products</h5>
        <a href="#">Popular</a><br>
        <a href="#">Most rated</a><br>
        <a href="#">Recent</a><br>
      </div>
      <div class="box-cell col-md-3 p-t-3 valign-middle">
        <a href="#" class="display-block m-b-1 text-nowrap"><i class="fa fa-twitter"></i>&nbsp;&nbsp;@pixeladmin</a>
        <a href="#" class="display-block m-b-1 text-nowrap"><i class="fa fa-facebook"></i>&nbsp;&nbsp;PixelAdmin</a>
        <a href="#" class="display-block text-nowrap"><i class="fa fa-envelope"></i>&nbsp;&nbsp;support@pixeladmin.com</a>
      </div>
    </div>

    <hr class="page-wide-block">

    <span class="text-muted">Copyright © 2016 PixelAdmin LLC. All rights reserved.</span>
  </footer>-->

  <!-- Initialize demo sidebar on page load -->


  <!-- Get jQuery from Google CDN -->
  <!--[if !IE]> 
    <script type="text/javascript"> window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">'+"<"+"/script>"); </script>
   <![endif]-->
  <!--[if lte IE 9]>
    <script type="text/javascript"> window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">'+"<"+"/script>"); </script>
  <![endif]-->

  <script src="../cods/js/control/bootstrap.js"></script>
  <script src="../cods/js/control/pixeladmin.js"></script>
  
  <script type="text/javascript">
    pxInit.unshift(function() {
      var file = String(document.location).split('/').pop();
	
      // Remove unnecessary file parts
      file = file.replace(/(\.html).*/i, '$1');

      if (!/.html$/i.test(file)) {
        file = 'index.php';
      }

      // Activate current nav item
      $('#px-demo-nav')
        .find('.px-nav-item > a[href="' + file + '"]')
        .parent()
        .addClass('active');

      $('#px-demo-nav').pxNav();
      //$('#px-demo-footer').pxFooter();
    });

    for (var i = 0, len = pxInit.length; i < len; i++) {
      pxInit[i].call(null);
    }
  </script>
</body>
</html>