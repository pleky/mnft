<!-- contact us -->
<section class="contact-us mt-2" id="contact-us">
        <div class="container">
          <div class="heading-light">
            <h4 class="text-white fw-light">Contact Us</h4>
          </div>

          <div class="row mt-5">
            <div class="col-md-4">
              <form action="">
                <div class="mb-3">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name*">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email*">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number">
                </div>
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                  <label for="floatingTextarea2">Message</label>
                </div>
              </form>
            </div>
            <div class="col-md-4">
                <div class="d-flex mb-3"><i data-feather="phone" class="icon-wrapper text-white"></i><span>{{ $profile->phone }}</span></div>
                <div class="d-flex mb-3"><i data-feather="mail" class="icon-wrapper text-white"></i><span>{{ $profile->email }}</span></div>
                <div class="d-flex">
                  <span><i data-feather="home" class="icon-wrapper text-white"></i></span>
                  <span>{{ $profile->address }}</span>
                </div>
            </div>
            <div class="col-md-4">
              <div class="contact-us-item"></div>
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
              <p class="text-muted">PT Raja Teknik Aditama (RTA) Engineering Ltd,
                330 Coleford Road,
                Sheffield,
                South Yorkshire,
                S9 5PH,
                United Kingdom.</p>
              <p class="text-muted mb-1">Phone: <span class="text-white">{{ $profile->phone }}</span></p>
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

    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="{{ asset('assets/gallery/img-previewer.min.js') }}"></script>
    <script>
      feather.replace()
    </script>
</body>
</html>