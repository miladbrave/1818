@extends('front.layout.master')

@section('content')
    <div class="back">
        <div class="container">
            <div class="justify-content-center">
                <div class="card2">
                    <div class="card-header" style="padding-bottom: 3%;"> ثبت نام</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="fname" class="col-md-3 text-md-left order-md-2" style="float: unset"> نام :</label>
                                <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                    <input id="fname" type="text"
                                           class="form-control @error('fname') is-invalid @enderror text-right"
                                           name="fname"
                                           value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback pull-right text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-md-3 text-md-left order-md-2" style="float: unset"> نام خانوادگی :</label>
                                <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                    <input id="lname" type="text"
                                           class="form-control @error('lname') is-invalid @enderror text-right"
                                           name="lname"
                                           value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback pull-right text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 text-md-left order-md-2" style="float: unset"> ایمیل :</label>
                                <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback pull-right text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 text-md-left order-md-2" style="float: unset"> شماره موبایل :</label>
                                <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                    <input id="phone" type="text"
                                           class="form-control @error('mobile') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                           data-mask="99999999999">
                                    @error('phone')
                                    <span class="invalid-feedback pull-right text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 text-md-left order-md-2" style="float: unset">رمز عبور :</label>
                                <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback pull-right text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 text-md-left order-md-2" style="float: unset"> تایید رمز عبور
                                    :</label>
                                <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-7" style="float: unset">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت نام
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
