<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Income List Pdf</title>
    <style>
        .table-responsive {
            display: inline-block;
            width: 100%;
            overflow-x: auto;
        }
        table {
            border-collapse: collapse;
        }
        table tr td{
            border:1px solid #ccc;
            padding: 5px;
        }
        table tr th{
            border:1px solid #ccc;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h2 style="margin-bottom: -10px; important!;">Income Report</h2>
        <h4>Ekattor Sourcing LTD.</h4>
    </div>

    <table style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Category</th>
                <th>Title</th>
                <th>Reference No</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($reports as $key=>$value)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ date("d-M-y",strtotime($value->date)) }}</td>
                <td>{{ $value->category }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->reference_no }}</td>
                <td>{{ $value->amount }}</td>
            </tr>
            @php $total+= $value->amount; @endphp;
            @endforeach
            <tr>
                <td colspan="5" style="text-align: right;color:red">Total</td>
                <td style="color:red;">{{ $total }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
