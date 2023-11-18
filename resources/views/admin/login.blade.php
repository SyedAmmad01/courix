@extends('layouts.admin_auth')
@section('page_title' , 'Admin Log in')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('admin.auth') }}">
                @csrf
                <div class="brand text-center">
                    <img style="border-radius: 25px;" width="60%" src="../images/icons/logo.jpg">
                </div>
                <br>
                <div class="brand text-center text-light slnLoginHeadingClr">
                    <strong>
                        <h4>Courix Delivery</h4>
                    </strong>
                </div>
                <div class="brand text-center text-light slnLoginHeadingClr mt-2">
                    <strong>
                        <h4>Operations Portal</h4>
                    </strong>
                </div>
                <br>
                <div class="form-group m-b-20">
                    <input class="form-control form-control" data-val="true"
                        data-val-required="The Email field is required." id="email" name="email"
                        placeholder="Email" required="required" type="text" value="{{ old('email') }}">
                    <span class="field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                </div>

                <div class="form-group m-b-20">
                    <input class="form-control form-control" data-placement="after" data-toggle="password"
                        data-val="true" data-val-required="The Password field is required." id="password"
                        name="password" placeholder="Password" required="required" type="password">
                    <span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                </div>

                <div class="login-buttons">
                    <button class="btn btn-loginPage btn-block btn-lg" id="btnLogin" type="submit">
                        <i class="fa fa-sign-in-alt"></i> Secure Log In
                    </button>
                </div>

                <!-- Display errors if there are any -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
                @endif

            </form>
            <br>
            <p class="text-center text-light RightReserved" style="font-size: 11px;">
                © Courix Delivery Services All Right Reserved 2023
            </p>
        </div>
    </div>
</div>
@endsection
