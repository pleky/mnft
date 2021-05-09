
    <footer>
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Get in touch</h5>
              <address>
                    <strong>PT. Sendiko Nusantara Teknologi</strong><br>
                    Mall MGK Kemayoran lantai 1 B7 No.6, 
                    Gunung Sahari Selatan Kemayoran,
                    Jakarta Pusat, DKI Jakarta
               </address>
              <p>
                <!-- <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br> -->
                <i class="icon-envelope-alt"></i> corporate@sendikonusantara.com
              </p>
            </div>
          </div>
          <div class="span4">&nbsp;</div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Subscribe newsletter</h5>
              <p>
                Keep updated for new releases and freebies. Enter your e-mail and subscribe to our newsletter.
              </p>
              <form class="subscribe" action="/emailpost" method="post">
                {{ csrf_field() }}
                <div class="input-append">
                  <input class="span2" type="email" id="email" name="email" type="text">
                  <input class="btn btn-theme" type="submit" value="Subscribe">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p><span>&copy; Sendiko Nusantara company. All right reserved</span></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>

  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{ asset("/dist/js/jquery.js")}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script src="{{ asset("/dist/js/jquery.easing.1.3.js")}}"></script>
  <script src="{{ asset("/dist/js/bootstrap.js")}}"></script>

  <script src="{{ asset("/dist/js/modernizr.custom.js")}}"></script>
  <script src="{{ asset("/dist/js/toucheffects.js")}}"></script>
  <script src="{{ asset("/dist/js/google-code-prettify/prettify.js")}}"></script>
  <script src="{{ asset("/dist/js/jquery.bxslider.min.js")}}"></script>
  <script src="{{ asset("/dist/js/camera/camera.js")}}"></script>
  <script src="{{ asset("/dist/js/camera/setting.js")}}"></script>

  <script src="{{ asset("/dist/js/jquery.prettyPhoto.js")}}"></script>
  <script src="{{ asset("/dist/js/portfolio/jquery.quicksand.js")}}"></script>
  <script src="{{ asset("/dist/js/portfolio/setting.js")}}"></script>

  <script src="{{ asset("/dist/js/jquery.flexslider.js")}}"></script>
  <script src="{{ asset("/dist/js/animate.js")}}"></script>
  <script src="{{ asset("/dist/js/inview.js")}}"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{ asset("/dist/js/custom.js")}}"></script>

</body>
</html>