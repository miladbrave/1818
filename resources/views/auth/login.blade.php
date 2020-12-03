@extends('front.layout.master')

@section('content')
    <div class="back2">
        <div class="container">
            <div class="justify-content-center">
                <div class="card2">
                    <div class="card-header" style="padding-bottom: 3%;">ورود</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-left order-md-2" style="float: unset">نام کاربری
                                    :</label>
                                <div class="col-md-6" style="margin-left: 21% ">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback pull-right text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-left order-md-2" style="float: unset">
                                    پسوورد :</label>
                                <div class="col-md-6 order-md-1" style="margin-left: 21%">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8" style="float: unset">
                                    <div class="pull-right lg" style="margin-right: 40%">
                                        <button type="submit" class="btn btn-primary" style="margin-left: 0%">
                                            ورود
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}" style="color: red">
                                                فراموشی رمز
                                            </a>
                                        @endif
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label order-md-2" for="remember">
                                                به یاد بسپار
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
