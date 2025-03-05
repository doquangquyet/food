@extends('giaodien.layout.layout')

@section('content')

<section class="gap">
   <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="box login">
            <h3>Reset Your Password</h3>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus  placeholder="Nhập email vào" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

               <div class="flex items-center justify-end mt-4">
    <button type="submit" class="button">Reset Link</button>
</div>
            </form>

          </div>
        </div>
      </div>
   </div>
</section>

@endsection
