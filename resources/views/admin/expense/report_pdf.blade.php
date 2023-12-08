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
            position: absolute;bottom:0;
        }
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
        .watermark {
            display: inline;
            position: fixed !important;
            opacity: 0.15;
            font-size: 6em;
            width: 100%;
            text-align: center;
            z-index: 1000;
            top:50%;
            right:5px;
            /* Rotate div */
            -ms-transform: rotate(-50deg); /* IE 9 */
            -webkit-transform: rotate(-50deg); /* Chrome, Safari, Opera */
            transform: rotate(-50deg);
            pointer-events: none; /*edited: this will prevent ignoring background links*/
        }
    </style>
</head>

<body style="position: relative; width: 100%;height: 100%;">
    <div class="watermark">Ekattor Sourcing</div>

    <div style="text-align: center;">
        <img src="{{ public_path('images/invoice') }}/header.jpg" alt="" style="max-width: 100%;" />

        <div style="width: 84%; margin: 0 auto;">




            {{--  <img src="{{ public_path('images/invoice') }}/body-logo.jpg" alt="" style="max-width: 100%; margin-top: 30px; position: absolute; z-index: -1; top:0;left:0; width: 100%;height: 100%;" />  --}}

            <table style="width:90%; margin: 15px auto">
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
        </div>

        <div class="footer">
            <div style="width: 84%; margin: 0 auto; clear: both;">
                <div style="float: left; width: 40%; text-align: left; color: #fff; font-family:Arial, Helvetica, sans-serif ;">
                    <h3>Bangladesh Office</h3>
                    <p>House 12 (4th Floor B-4) </p>
                    <p>Road  Garib-E Newaz Avenue</p>
                    <p>Sector 13, Uttara Model Town</p>
                    <p>Uttara- 1230, Dhaka, Bangladesh</p>
                    <p>Phone / Cell +88-01671-711857 </p>
                </div>
                <div style="text-align: left; margin-top: 15px; color: #fff; font-family:Arial, Helvetica, sans-serif ;">
                    <h3 style="margin-bottom: 15px;">E-mail :- info@ekattor-bd.com</h3>
                    <h4>Web :- www.ekattor-bd.com / www.alalgroup.com/etbl</h4>
                </div>
            </div>

        </div>
    </div>

</body>

</html>

