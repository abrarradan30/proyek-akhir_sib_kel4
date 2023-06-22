<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Ngalamkos</title>
      <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
          Login 
         </div>
         <form method="POST" action="{{ route('login') }}">
         @csrf
            <div class="field">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
               <label>Email Address</label>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="field">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
               <label>Password</label>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="content">
               <div class="checkbox">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
               </div>
            </div>
            <div class="field">
               <input type="submit" value="login">
            </div>
            <div class="signup-link">
               Not a customer? <a href="{{ route('register') }}">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>