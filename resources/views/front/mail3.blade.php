<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h2 style="text-align: center">ارتباط با ما</h2><br><br>

<table style=" border: 1px solid black;width: 100%;border-collapse: collapse;margin-top: 5%">
    <tr style=" border: 1px solid black">
        <th style=" border: 1px solid black">ایمیل</th>
        <th style=" border: 1px solid black">نام و نام خانوادگی</th>
    </tr>
    <tr>
        <td style=" border: 1px solid black;text-align: center;width: 20%;color: red;padding: 15px">{{$messages->email}}</td>
        <td style=" border: 1px solid black;text-align: center;width: 20%;color: red;padding: 15px">{{$messages->name}}</td>
    </tr>
</table>
<table>
    <tr style=" border: 1px solid black">
        <th style=" border: 1px solid black"> متن</th>
    </tr>
    <tr>
        <td style=" border: 1px solid black;text-align: center;width: 20%;color: red;padding: 15px">{{$messages->description}}</td>
    </tr>
</table>


<h1 style="text-align: center">.از خرید شما متشکریم</h1>
<h3 style="text-align: center">آذر یدک ریو</h3>

</body>
</html>
