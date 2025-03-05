<footer style="background-image: url({{ asset('giaodien') }}/assets/img/footer.png);background-color: #f5f8fd;">
   <div class="container">
      <div class="row">
         <div class="col-xl-4 col-lg-6">
            <div class="logo-white">
               <a href="index.html"><img alt="logo-white" src="{{ asset('giaodien') }}/assets/img/logo-white.png"></a>
               <p>Tuesday - Saturday:   12:00pm - 23:00pm 
               <span>Closed on Sunday</span></p>
               <img alt="tripa" src="{{ asset('giaodien') }}/assets/img/tripa.png">
               <h6>5 star rated on TripAdvisor</h6>
            </div>
         </div>
         <div class="col-xl-2 col-lg-3 col-md-6">
            <div class="link-about">
               <h3>About</h3>
               <ul>
                  <li><i class="fa-solid fa-angle-right"></i><a href="about.html">Information</a></li>
                  <li><i class="fa-solid fa-angle-right"></i><a href="#">Special Dish</a></li>
                  <li><i class="fa-solid fa-angle-right"></i><a href="#">Reservation</a></li>
                  <li><i class="fa-solid fa-angle-right"></i><a href="contact.html">Contact</a></li>
               </ul>
            </div>
         </div>
         <div class="col-xl-2 col-lg-3 col-md-6">
            <div class="link-about">
               <h3>menu</h3>
               <ul>
                  <li><i class="fa-solid fa-angle-right"></i><a href="menu-1.html">Steaks</a></li>
                  <li><i class="fa-solid fa-angle-right"></i><a href="menu-1.html">Burgers</a></li>
                  <li><i class="fa-solid fa-angle-right"></i><a href="menu-1.html">Coctails</a></li>
                  <li><i class="fa-solid fa-angle-right"></i><a href="menu-1.html">Bar B Q</a></li>
                  <li><i class="fa-solid fa-angle-right"></i><a href="menu-1.html">Desserts</a></li>
               </ul>
            </div>
         </div>
         <div class="col-xl-4 col-lg-6">
            <div class="link-about">
               <h3>Newsletter</h3>
               <p>Get recent news and updates.</p>
     <form class="footer-form" action="{{ route('subscribe-email.store') }}" method="POST">
    @csrf

    <input type="email" name="email" placeholder="Enter Your Email Address..."
           class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <button class="button">Subscribe</button>
</form>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif


            </div>
         </div>
      </div>
      <div class="footer-bootem">
         <h6><span>© 2023 Foodio</span> | Restaurant and BBQ.</h6>
         <div class="header-social-media">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
            <a href="#">Youtube</a>   
         </div>
      </div>
   </div>
</footer>
<!-- progress -->
<div id="progress">
      <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
</div>

<!-- Bootstrap Js -->
<script src="{{ asset('giaodien') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('giaodien') }}/assets/js/owl.carousel.min.js"></script>
<!-- fancybox -->
<script src="{{ asset('giaodien') }}/assets/js/jquery.fancybox.min.js"></script>
<script src="{{ asset('giaodien') }}/assets/js/custom.js"></script>

<!-- Form Script -->
<script src="{{ asset('giaodien') }}/assets/js/contact.js"></script>
<script type="text/javascript" src="{{ asset('giaodien') }}/assets/js/sweetalert.min.js"></script>
</body>
