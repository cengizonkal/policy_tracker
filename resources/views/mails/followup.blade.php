<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>Takip</h2>

<table>
    <tr>
        <th>Müşteri</th>
        <th>Bitiş Süresi</th>
        <th>Tutar</th>
    </tr>
    @foreach($policies as $policy)
        <tr>
            <td>{{$policy->customer->fullname}}</td>
            <td>{{$policy->valid_until->format('d/m/Y')}}</td>
            <td>{{$policy->price}}</td>
        </tr>
    @endforeach

    <tr>
        <td colspan="3"><strong>Toplam Poliçe Sayısı : {{$policies->count()}}</strong></td>
    </tr>
</table>
<br>

</body>
</html>
