@extends('front.layout.master')

@section('content')
    <div class="back2">
        <div class="container">
            <div class="justify-content-center">
                <div class="card2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{--                                {{ session('status') }}--}}
                            <span class="text-right">لینک بازیابی پسورد به ایمیل شما ارسال شد.</span>
                        </div>
                    @endif
                    <div class="card-header" style="padding-bottom: 3%;margin-right: 25%">بازیابی رمز عبور</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right order-md-1 pull-right"
                                      >ایمیل :</label>
                                <div class="col-md-6 order-md-2 pull-right">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0 ">
                                <div class="col-md-9" style="float: unset">
                                    <button type="submit" class="btn btn-primary">
                                        فرستادن لینک بازیابی رمز
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
