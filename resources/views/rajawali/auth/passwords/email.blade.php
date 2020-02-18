@extends('layouts.appAdmin')
@section('content-admin')
<div class="content-login">
    <div class="col-md-12">
        <div class="p-4"> 
            <h3 class="mb-3 text-30" align="center">Forgot Password</h3>
            <br>
            <form class="form-signin" method="POST" action="{{ route('Rajawali.password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" class="form-control" type="email" placeholder="Email" required autocomplete="email" autofocus>
                @error('email')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div> 
            <button class="btn btn-rounded btn-primary btn-block mt-2" type="submit">  {{ __('Send Password Reset Link') }}</button>
            
            </form>

            <div class="mt-3 text-center">
                <a href="/"><u>Login</u> </a> 
            </div> 

        </div>
    </div>                  
</div> 
@endsection
