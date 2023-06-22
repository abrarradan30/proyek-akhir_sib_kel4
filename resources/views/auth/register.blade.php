<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Register Ngalamkos</title>
      <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
          Register
         </div>
         <form method="POST" action="{{ route('register') }}">
         @csrf
            <div class="field">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label>Name</label>
             </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="field">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
               <label>Email Address</label>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="field">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
               <label>Password</label>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="field">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label>Confirm Password</label>
             </div>
            <div class="field">
               <input type="submit" value="register">
            </div>
         </form>
      </div>
   </body>
</html>