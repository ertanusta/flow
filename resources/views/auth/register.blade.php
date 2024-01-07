@extends('layouts.guest')
@section('content')
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
        <div class="card card-plain">
            <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Sign UP</h4>
                <p class="mb-0">Enter your name,email and password to sign up</p>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" aria-label="Password">
                    </div>
                    <div class="form-check form-check-info text-start">
                        <input class="form-check-input" type="checkbox" name="terms_and_conditions" value="" id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                        </label>
                    </div>
                    @if($errors->has('password'))
                        @foreach($errors->all() as $error)
                            <div class="text-center">
                                {{ $error }}
                            </div>
                        @endforeach

                    @endif
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                    </div>
                </form>
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
