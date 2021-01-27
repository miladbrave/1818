<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h2 style="text-align: center">فاکتور فروش</h2><br><br>
<h3 style="text-align: right">
    این فاکتور سفارش خرید
    &nbsp;
    <strong>{{$user->fname}}{{$user->lname}}</strong>
    &nbsp;
    می باشد.
</h3>

<table style=" border: 1px solid black;width: 100%;border-collapse: collapse">
    <tr style=" border: 1px solid black">
        <th style=" border: 1px solid black">تاریخ</th>
        <th style=" border: 1px solid black">قیمت حمل و نقل</th>
        <th style=" border: 1px solid black">قیمت کل</th>
        <th style=" border: 1px solid black">شماره فاکتور</th>
    </tr>
    <tr style=" border: 1px solid black">
        <td style=" border: 1px solid black;text-align: center">{{Verta::instance($userlists->created_at)->format('%B %d، %Y')}}</td>
        <td style=" border: 1px solid black;text-align: center">{{$userlists->receiveprice}}</td>
        <td style=" border: 1px solid black;text-align: center">{{$userlists->totalprice}}</td>
        <td style=" border: 1px solid black;text-align: center">{{$userlists->factor}}</td>
    </tr>
</table>
<hr>
<table style=" border: 1px solid black;width: 100%;border-collapse: collapse">
    <tr style=" border: 1px solid black">
        <th style=" border: 1px solid black">قیمت محصول</th>
        <th style=" border: 1px solid black">تعداد محصول</th>
        <th style=" border: 1px solid black">نام محصول</th>
        <th style=" border: 1px solid black">تصویر</th>
    </tr>

    @foreach($purchlists as $purch)
        @foreach($purch->where('factor_number',$userlists->id) as $pur)
            @foreach($purchl->where('id',$pur->product_id) as $p)
                <tr style=" border: 1px solid black">
                    <td style=" border: 1px solid black;text-align: center;width: 30%">
                        <span style="color: red">{{$p->price}} ریال</span>
                    </td>
                    <td style=" border: 1px solid black;text-align: center;width: 20%">{{$pur->count}}تعداد</td>
                    <td style=" border: 1px solid black;text-align: center;width: 20%"> {{$p->name}}</td>
                    <td style=" border: 1px solid black;text-align: right;width: 30%">
                        @if(isset($p->photos->first()->path))
                            <img
                                src="{{asset($p->photos->first()->path)}}" alt="" width="60%"
                                height="100px"></td>
                    @else
                        <img
                            src="{{asset('/front/img/1.jpg')}}"
                            alt="آذر یدک ریو" title="آذر یدک ریو"
                            class="img-responsive"/>
                    @endif
                </tr>
            @endforeach
        @endforeach
    @endforeach

</table>

<h1 style="text-align: center">.از خرید شما متشکریم</h1>
<h3 style="text-align: center">آذر یدک ریو</h3>

<h5 style="text-align: center">شماره مرسوله برای شما فرستاده خواهد شد.</h5>


</body>
</html>
