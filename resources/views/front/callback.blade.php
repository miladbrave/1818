@extends('front.layout.master')

@section('content')
    <main>
        <section class="sliderthree">
            <div class="row">
                <div class="col-md-12 col-12">
                    <br>
                    <div class="prime-box">
                        <div class="container">
                            <div class="large-12 columns rtl text-justify">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center mt-2">اطلاعات پرداخت</h3>
                                        <div class="mt-3 mb-2">
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ Session('success') }}
                                                </div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ Session('error') }}
                                                </div>
                                            @endif
                                        </div>
                                        <table class="table table-striped table-dark mt-5">
                                            <tbody>
                                            <tr>
                                                <td> نام کاربری</td>
                                                @if($pays->status == 'success' && Auth::check())
                                                    <td>{{Auth()->user()->fname }}{{Auth()->user()->lname}}</td>
                                                @else
                                                    <td> {{$pays->name}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>شماره رسید پرداخت</td>
                                                <td>
                                                    @if($pays->status == 'success')
                                                        {{$pays->order_id}}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تاریخ پرداخت</td>
                                                <td>
                                                    @if($pays->status == 'success')
                                                        {{Verta::instance($pays->payment_date)}}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>مبلغ پرداخت</td>
                                                <td>
                                                    @if($pays->status == 'success')
                                                        {{number_format($pays->price)}} تومان
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
