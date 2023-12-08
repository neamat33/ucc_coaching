<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">

<head>
    <title></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <br />
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .footer {
            overflow: hidden;
            width: 100%;
            display: block;
            background: #00a650;
            padding: 30px 0 50px;
            position: absolute;
            bottom: 0;
        }

        .table-responsive {
            display: inline-block;
            width: 100%;
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
        }

        table tr td {
            border: 1px solid #ccc;
            padding: 5px;
        }

        table tr th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        .watermark {
            display: inline;
            position: fixed !important;
            opacity: 0.15;
            font-size: 6em;
            width: 100%;
            text-align: center;
            z-index: 1000;
            top: 50%;
            right: 5px;
            /* Rotate div */
            -ms-transform: rotate(-50deg);
            /* IE 9 */
            -webkit-transform: rotate(-50deg);
            /* Chrome, Safari, Opera */
            transform: rotate(-50deg);
            pointer-events: none;
            /*edited: this will prevent ignoring background links*/
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="position: relative; width: 100%;height: 100%;">
    <div class="watermark">Ekattor Sourcing</div>

    <div style="text-align: center;">
        <img src="{{ public_path('images/invoice') }}/header.jpg" alt="" style="max-width: 100%;" />

        <div style="width: 84%; margin: 0 auto;">
            <div style="display: inline-flex;width:100%;">
                <div>
                    <table style="width:90%; margin: 15px auto">
                        <thead>
                            <h3>Income Transaction</h3>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Income</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $income = 0;
                                $key= 1;
                            @endphp
                            @foreach ($reports as $value)
                                <tr>
                                    @if ($value->transaction_type == 'income')
                                        <td>{{ $key++ }}</td>
                                        <td>{{ date('d-M-y', strtotime($value->created_at)) }}</td>
                                        <td>{{ $value->amount }}</td>
                                        @php $income+= $value->amount;  @endphp
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" style="text-align: right;color:rgb(51, 223, 8);"><b>Total</b></td>
                                <td style="color:rgb(51, 223, 8);"><b>{{ number_format($income,2) }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <table style="width:90%; margin: 15px auto">
                        <thead>
                            <h3>Expense Transaction</h3>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Expense</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $expense = 0;
                                $sn= 1;
                            @endphp
                            @foreach ($reports as $value)
                                <tr>
                                    @if ($value->transaction_type == 'expense')
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ date('d-M-y', strtotime($value->created_at)) }}</td>
                                    <td>{{ $value->amount }}</td>
                                    @php $expense+= $value->amount; @endphp
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" style="text-align: right;color:red">Total</td>
                                <td style="color:red;">{{number_format($expense,2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <table style="width:40%; margin-left: 366px;">
                    <tr>
                        <td>Total Income</td>
                        <td>: </td>
                        <td>{{ number_format($income,2) }}</td>
                    </tr>
                    <tr>
                        <td>Total Expense</td>
                        <td>: </td>
                        <td>{{ number_format($expense,2) }}</td>
                    </tr>
                    <tr>
                        <td>Blance</td>
                        <td>: </td>
                        <td>{{ number_format(($income - $expense),2) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer">
            <div style="width: 84%; margin: 0 auto; clear: both;">
                <div
                    style="float: left; width: 40%; text-align: left; color: #fff; font-family:Arial, Helvetica, sans-serif ;">
                    <h3>Bangladesh Office</h3>
                    <p>House 12 (4th Floor B-4) </p>
                    <p>Road Garib-E Newaz Avenue</p>
                    <p>Sector 13, Uttara Model Town</p>
                    <p>Uttara- 1230, Dhaka, Bangladesh</p>
                    <p>Phone / Cell +88-01671-711857 </p>
                </div>
                <div
                    style="text-align: left; margin-top: 15px; color: #fff; font-family:Arial, Helvetica, sans-serif ;">
                    <h3 style="margin-bottom: 15px;">E-mail :- info@ekattor-bd.com</h3>
                    <h4>Web :- www.ekattor-bd.com / www.alalgroup.com/etbl</h4>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
