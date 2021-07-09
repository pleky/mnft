<!-- contact us -->
<section class="contact-us mt-2" id="contact-us">
        <div class="container">
          <div class="heading-light">
            <h4 class="text-white fw-light">Contact Us</h4>
          </div>

          <div class="row mt-5">
            <div class="col-md-4">
              <form id="contactUs" >
                <div class="mb-3">
                  <input type="text" required class="form-control" id="name" aria-describedby="" placeholder="Name*">
                </div>
                <div class="mb-3">
                  <input type="email" required class="form-control" id="email" aria-describedby="" placeholder="Email*">
                </div>
                <div class="mb-3">
                  <input type="text" required class="form-control" id="phone" aria-describedby="" placeholder="Phone Number">
                </div>
                <div class="mb-3">
                  <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" id="attachmen" name="attachmen" accept=".pdf,.doc"/>
                </div>
                
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	              <div class="g-recaptcha mt-3" id="feedback-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY')  }}"></div>
                <button type="submit" id="submit" class="btn btn-danger mt-2">Kirim</a>
              </form>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-3"><i data-feather="phone" class="icon-wrapper text-white"></i><span>{{ $profile->phone }}</span></div>
                <div class="d-flex mb-3"><i data-feather="inbox" class="icon-wrapper text-white"></i><span>{{ $profile->fax }}</span></div>
                <div class="d-flex mb-3"><i data-feather="mail" class="icon-wrapper text-white"></i><span>{{ $profile->email }}</span></div>
                <div class="d-flex">
                  <span><i data-feather="home" class="icon-wrapper text-white"></i></span>
                  <span>{{ $profile->address }}</span>
                </div>
            </div>
            <div class="col-md-4">
              <div class=""></div>
            </div>
          </div>
        </div>
      </section>
      <!-- end contact us -->

      <!-- footer -->
      <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <p class="text-white" >{{ $profile->company_name }}</p>
              <p class="text-muted">{{ $profile->description }}</p>
            </div>
            <div class="col">
              <p class="text-white">Contact Info</p>
              <p class="text-muted">{{ $profile->address }}</p>
              <p class="text-muted mb-1">Phone: <span class="text-white">{{ $profile->phone }}</span></p>
              <p class="text-muted mb-1">Fax: <span class="text-white">{{ $profile->fax }}</span></p>
              <p class="text-muted mb-1">Email: <span class="text-white">{{ $profile->email }}</span></p>
              <p class="text-muted">Web: <span class="text-white">{{ $profile->website }} </span></p>
            </div>
            <div class="col-md-3">
              <p class="text-white">Our Social Media</p>
              <div class='text-white'>
                <ul>
                  <li>
                    <a href="{{ $profile->website }}" target='_blank'>
                      <i data-feather="globe"></i>
                      <span>{{ $profile->company_name }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $profile->instagram }}" target='_blank'>
                      <i data-feather="instagram"></i>
                      <span>{{ $profile->company_name }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $profile->youtube }}" target='_blank'>
                      <i data-feather="youtube"></i>
                      <span>{{ $profile->company_name }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $profile->facebook }}" target='_blank'>
                      <i data-feather="facebook"></i>
                      <span>{{ $profile->company_name }}</span>
                    </a>
                  </li>
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- end footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="{{ asset('assets/gallery/img-previewer.min.js') }}"></script>
    <script>
      feather.replace()

      $('#contactUs').submit(function(e) {
        e.preventDefault();

        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var message_text = $('#message').val();
        var attachment = $('#attachmen').val();
        
        $.ajax({
          url: '/contact-us',
          type: 'POST',
          data: {
              _token: "{{ csrf_token() }}",
              name: name,
              email: email,
              phone: phone,
              message_text: message_text,
              attachment: attachment,
          },
          success: function(msg) {
            swal({
              title: "Sukses",
              text: "Pesan Anda Berhasil Dikirim",
              icon: "success",
            })
          }               
        });
      });
    </script>
</body>
</html>