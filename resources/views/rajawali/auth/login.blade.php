@extends('layouts.appAdmin')

@section('content-admin')

<div class="content-login">
                    <div class="title-form"><h3>Adminstrator</h3></div>

                    <form name="loginForm" method="POST" action="{{ route('Rajawali.request') }}" autocomplete="off" novalidate="">
                    @csrf    
                    <div class="login-main-form">
                            <input id="email" class="input-stl" autocomplete="off" name="email" placeholder="Username or Email" type="email" required="">
                            @error('email')
                                <span class="help-block">
                                    <p class="error" style="color:#FFBABA;"><strong> {{ $message }} </strong></p>
                                </span>
                            @enderror

                            <input id="password" class="input-stl" autocomplete="off" name="password" placeholder="Password" type="password" required="">
                                @error('password')
                                <span class="help-block">
                                    <p class="error" style="color:#FFBABA;"><strong> {{ $message }} </strong></p>
                                </span>
                                @enderror

                            <div class="login-btn-wrapp">
                                <button automation-id="login-sts-btn-sign-in" class="">Sign in</button>
                            </div>
                            <div class="login-more row">
                                <div class="login-more-forgot col">
                                    <a class="e-link" href="{{ route('Rajawali.password.request') }}">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
 
@endsection
