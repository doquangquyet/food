@extends('giaodien.layout.layout')
@section('content')

<section class="gap">
   <div class="container">
      <div class="row">
        <div class="col-lg-6" >
          <div class="box login">
            <h3>Log In Your Account</h3>
       <form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Username or email address"
           value="{{ old('email') }}" required>

    @error('email')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="password" name="password" id="password" placeholder="Password" required>
    @error('password')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <div class="remember">
        <div class="first">
            <input type="checkbox" name="remember" id="rememberCheckbox" onclick="togglePassword()">
            <label for="rememberCheckbox">Remember me</label>
        </div>
        <div class="second">
            <a href="{{ route('password.request') }}">Forget a Password?</a>
        </div>
    </div>

    <button type="submit" class="button">Login</button>
</form>

@if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed!',
                text: '{{ session("error") }}',
                showConfirmButton: true
            });
        });
    </script>
@endif

          </div>
        </div>
        <div class="col-lg-6">
          <div class="box register">
            <div class="parallax" style="background-image:   url({{ asset('giaodien') }}/assets/img/patron.jpg)"></div>
                                                      
            <h3>Log In Your Account</h3>
       <form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Complete Name" value="{{ old('name') }}" required>
    @error('name')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="email" name="email" placeholder="Username or email address" value="{{ old('email') }}" required>
    @error('email')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    @error('password_confirmation')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>

    <button type="submit" class="button">Register</button>
</form>

@if($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                showConfirmButton: true
            });
        });
    </script>
@endif

<script>
    function togglePassword() {
        let passwordInput = document.getElementById("password");
        let rememberCheckbox = document.getElementById("rememberCheckbox");

        if (rememberCheckbox.checked) {
            passwordInput.type = "text"; // Hiển thị mật khẩu
        } else {
            passwordInput.type = "password"; // Ẩn mật khẩu
        }
    }
</script>


          </div>
        </div>
      </div>
   </div>
</section>
@endsection