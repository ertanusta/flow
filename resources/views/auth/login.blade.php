@extends('layouts.guest')
@section('content')
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
        <div class="card card-plain">
            <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Sign In</h4>
                <p class="mb-0">Enter your email and password to sign in</p>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                               placeholder="Email"
                               aria-label="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                               placeholder="Password"
                               aria-label="Password">
                    </div>
                    <div class="text-center">
                        @if($errors->has('password'))
                            {{ $errors->get('password')}}
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign Up</a>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div
        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
        <div
            class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
            <span class="mask bg-gradient-primary opacity-6"></span>
            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                currency"</h4>
            <p class="text-white position-relative">The more effortless the writing looks, the more
                effort the writer actually put into the process.</p>
        </div>
    </div>
@endsection
