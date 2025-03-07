@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif
@if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: '{{ session("error") }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif

<header class="one">
  <div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
               <div class="d-flex align-items-center">
                  <div class="content-header me-5">
                    <i>
                        <svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_16-Smartphone" data-name="16-Smartphone"><path d="m23 2h-14a3 3 0 0 0 -3 3v22a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-22a3 3 0 0 0 -3-3zm-5.39 2-.33 1h-2.56l-.33-1zm6.39 23a1 1 0 0 1 -1 1h-14a1 1 0 0 1 -1-1v-22a1 1 0 0 1 1-1h3.28l.54 1.63a2 2 0 0 0 1.9 1.37h2.56a2 2 0 0 0 1.9-1.37l.54-1.63h3.28a1 1 0 0 1 1 1z"/><path d="m17 24h-2a1 1 0 0 0 0 2h2a1 1 0 0 0 0-2z"/></g></svg>
                    </i><h4>Phone:<a href="callto:+1(850)344066">+1 (850) 344 0 66</a></h4>
                  </div>
                  <div class="content-header">
                    <i>
                        <svg height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_01-Email" data-name="01-Email"><path d="m29.61 12.21-13-10a1 1 0 0 0 -1.22 0l-13 10a1 1 0 0 0 -.39.79v14a3 3 0 0 0 3 3h22a3 3 0 0 0 3-3v-14a1 1 0 0 0 -.39-.79zm-13.61-7.95 11.36 8.74-11.36 8.74-11.36-8.74zm11 23.74h-22a1 1 0 0 1 -1-1v-12l11.39 8.76a1 1 0 0 0 1.22 0l11.39-8.76v12a1 1 0 0 1 -1 1z"/></g></svg>
                     </i><h4>Email:<a href="mailto:+1(850)344066">info@domain.com</a></h4>
                  </div>
               </div>
            </div>
            <div class="col-xl-6">
               <div class="d-flex align-items-center login">
               <div class="header-social-media">
                  <a href="#">
                     Facebook
                  </a>
                  <a href="#">
                     Instagram
                  </a>
                  <a href="#">
                     Youtube
                  </a>   
               </div>
               <div class="register">
                  <i>
                     <svg clip-rule="evenodd" fill-rule="evenodd" height="512" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Approved-User"><path d="m10.105 22.3c.21-.482.511-.926.89-1.305.797-.797 1.878-1.245 3.005-1.245h4c1.127 0 2.208.448 3.005 1.245.379.379.68.823.89 1.305.166.379.608.553.988.387.379-.165.553-.608.387-.987-.285-.653-.691-1.253-1.204-1.766-1.078-1.078-2.541-1.684-4.066-1.684-1.3 0-2.7 0-4 0-1.525 0-2.988.606-4.066 1.684-.513.513-.919 1.113-1.204 1.766-.166.379.008.822.387.987.38.166.822-.008.988-.387z"/><path d="m16 8.25c-3.174 0-5.75 2.576-5.75 5.75s2.576 5.75 5.75 5.75 5.75-2.576 5.75-5.75-2.576-5.75-5.75-5.75zm0 1.5c2.346 0 4.25 1.904 4.25 4.25s-1.904 4.25-4.25 4.25-4.25-1.904-4.25-4.25 1.904-4.25 4.25-4.25z"/><path d="m26.609 12.25c.415 1.173.641 2.435.641 3.75 0 6.209-5.041 11.25-11.25 11.25s-11.25-5.041-11.25-11.25 5.041-11.25 11.25-11.25c1.315 0 2.577.226 3.75.641.39.138.819-.067.957-.457s-.067-.819-.457-.957c-1.329-.471-2.76-.727-4.25-.727-7.037 0-12.75 5.713-12.75 12.75s5.713 12.75 12.75 12.75 12.75-5.713 12.75-12.75c0-1.49-.256-2.921-.727-4.25-.138-.39-.567-.595-.957-.457s-.595.567-.457.957z"/><path d="m21.47 8.53 2 2c.293.293.767.293 1.06 0l4-4c.293-.292.293-.768 0-1.06-.292-.293-.768-.293-1.06 0l-3.47 3.469s-1.47-1.469-1.47-1.469c-.292-.293-.768-.293-1.06 0-.293.292-.293.768 0 1.06z"/></g></svg>
                  </i><a href="{{ route('login') }}">Login</a>/<a href="login.html">Register</a>
               </div>
               </div>
            </div>
        </div>
    </div>
  </div>
  <div class="bottom-bar ">
    <div class="container">
         <div class="row align-items-center">
            <div class="col-xl-3">
               <div class="d-flex align-items-center justify-content-between">
                  <div class="logo">
                     <a href="index.html">
                        <img alt="logo" src="{{ asset('giaodien') }}/assets/img/logo.png">
                     </a>
                  </div>
                  <div class="d-flex cart-checkout">
                    <a href="cart-checkout.html">
                        <i>
                            <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g>
                            <path d="m452 120h-60.946c-7.945-67.478-65.477-120-135.054-120s-127.109 52.522-135.054 120h-60.946c-11.046 0-20 8.954-20 20v352c0 11.046 8.954 20 20 20h392c11.046 0 20-8.954 20-20v-352c0-11.046-8.954-20-20-20zm-196-80c47.484 0 87.019 34.655 94.659 80h-189.318c7.64-45.345 47.175-80 94.659-80zm176 432h-352v-312h40v60c0 11.046 8.954 20 20 20s20-8.954 20-20v-60h192v60c0 11.046 8.954 20 20 20s20-8.954 20-20v-60h40z"></path></g></svg>
                        </i>
                    </a>
                    <div class="bar-menu">
                         <i class="fa-solid fa-bars"></i>
                    </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-6">
               <nav class="navbar">
                  <ul class="navbar-links">
                    <li class="navbar-dropdown">
                      <a href="#">home</a>
                      <div class="dropdown">
                        <a href="index.html">home 1</a>
                        <a href="index-2.html">home 2</a>
                        <a href="index-3.html">home 3</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown">
                      <a href="about.html">Menus</a>
                      <div class="dropdown">
                        <a href="menu-1.html">Menu 1</a>
                        <a href="menu-2.html">Menu 2</a>
                        <a href="menu-3.html">Menu 3</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown">
                      <a href="#">Shop</a>
                      <div class="dropdown">
                        <a href="shop.html">our product</a>
                        <a href="product-details.html">product details</a>
                        <a href="shop-cart.html">shop cart</a>
                        <a href="cart-checkout.html">cart checkout</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown">
                      <a href="#">News</a>
                      <div class="dropdown">
                        <a href="our-blog.html">our blog</a>
                        <a href="blog-details.html">blog details</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown">
                      <a href="#">Pages</a>
                      <div class="dropdown">
                        <a href="about.html">about</a>
                        <a href="our-services.html">our services</a>
                        <a href="chef-details.html">chef details</a>
                        <a href="login.html">login</a>
                      </div>
                    </li>
                    <li class="navbar-dropdown">
                      <a href="contact.html">Contact</a>
                    </li>
                  </ul>
                </nav>
            </div>
            <div class="col-lg-3">
               <div class="hamburger-icon">
                  <div class="donation">

                <a href="JavaScript:void(0)" class="pr-cart">

                  <svg id="Shoping-bags" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m452 120h-60.946c-7.945-67.478-65.477-120-135.054-120s-127.109 52.522-135.054 120h-60.946c-11.046 0-20 8.954-20 20v352c0 11.046 8.954 20 20 20h392c11.046 0 20-8.954 20-20v-352c0-11.046-8.954-20-20-20zm-196-80c47.484 0 87.019 34.655 94.659 80h-189.318c7.64-45.345 47.175-80 94.659-80zm176 432h-352v-312h40v60c0 11.046 8.954 20 20 20s20-8.954 20-20v-60h192v60c0 11.046 8.954 20 20 20s20-8.954 20-20v-60h40z"></path></g></svg>

                </a>

                <div class="cart-popup">
                    <button type='button' class='close' onclick='$(this).parent().removeClass("show-cart");'>×</button>


                    <ul>

                      <li class="d-flex align-items-center position-relative">

                        <div class="p-img light-bg">

                          <img src="{{ asset('giaodien') }}/assets/img/product-img-1.png" alt="Product Image">

                        </div>

                        <div class="p-data">

                          <h3 class="font-semi-bold">Brown Sandwich</h3>

                          <p class="theme-clr font-semi-bold">1 x $10.50</p>

                        </div>

                        <a href="JavaScript:void(0)" id="crosss"></a>

                      </li>

                      <li class="d-flex align-items-center position-relative">

                        <div class="p-img light-bg">

                          <img src="{{ asset('giaodien') }}/assets/img/product-img-1.png" alt="Product Image">

                        </div>

                        <div class="p-data">

                          <h3 class="font-semi-bold">Banana Leaves</h3>

                          <p class="theme-clr font-semi-bold">1 x $12.60</p>

                        </div>

                        <a href="JavaScript:void(0)" id="cross"></a>

                      </li>

                    </ul>

                      <div class="cart-total d-flex align-items-center justify-content-between">

                        <span class="font-semi-bold">Total:</span>

                        <span class="font-semi-bold">$23.10</span>

                      </div>

                      <div class="cart-btns d-flex align-items-center justify-content-between">

                        <a class="font-bold" href="shop-cart.html">View Cart</a>

                        <a class="font-bold theme-bg-clr text-white checkout" href="cart-checkout.html">Checkout</a>

                      </div>

                </div>

              </div>
                     <a href="contact.html" class="button">Reserve a Table</a>
               </div>
            </div>
         </div>
   </div>  
  </div>
  <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
      <div class="res-log">
        <a href="index.html">
          <img src="{{ asset('giaodien') }}/assets/img/logo.png" alt="Responsive Logo" class="white-logo">
        </a>
      </div>
        <ul>

          <li class="menu-item-has-children"><a href="JavaScript:void(0)">Home</a>
            <ul class="sub-menu">

              <li><a href="index.html">home page 1</a></li>
              <li><a href="index-2.html">home page 2</a></li>
              <li><a href="index-3.html">home page 3</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children"><a href="JavaScript:void(0)">menus</a>
            <ul class="sub-menu">
              <li><a href="menu-1.html">menu 1</a></li>
              <li><a href="menu-2.html">menu 2</a></li>
              <li><a href="menu-3.html">menu 3</a></li>
            </ul>
          </li>

          
          <li class="menu-item-has-children"><a href="JavaScript:void(0)">shop</a>

          <ul class="sub-menu">
            <li><a href="shop.html">our product</a></li>
            <li><a href="product-details.html">product details</a></li>
            <li><a href="shop-cart.html">shop cart</a></li>
            <li><a href="cart-checkout.html">cart checkout</a></li>
          </ul>

          </li>
          <li class="menu-item-has-children"><a href="JavaScript:void(0)">News</a>

          <ul class="sub-menu">

           <li><a href="our-blog.html">our blog</a></li>
                    <li><a href="blog-details.html">blog details</a></li>
          </ul>

          </li>
          <li class="menu-item-has-children"><a href="JavaScript:void(0)">Pages</a>

          <ul class="sub-menu">

            <li><a href="about.html">about</a></li>
            <li><a href="our-services.html">our services</a></li>
            <li><a href="chef-details.html">chef details</a></li>
            <li><a href="login.html">login</a></li>
          </ul>

          </li>

          <li><a href="contact.html">contacts</a></li>

          </ul>

          <a href="JavaScript:void(0)" id="res-cross"></a>
  </div>
</header>
