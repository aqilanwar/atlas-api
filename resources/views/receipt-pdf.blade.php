<!DOCTYPE html>
<html>
<head>
    <title>Receipt - Atlas Edu</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Receipt</h1>
    <h3 class="text-center m-0 p-0">January 2023 Tuition Fee</h3>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Receipt Id - <span class="gray-color">{{ $timestamp }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Receipt Date - <span class="gray-color">{{ now()->toDateString()}}</span></p>
    </div>
    <div class="float-right">
        <img src="http://103.253.145.174/assets/img/logo.png" width="300px">      
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div>
                    <p>Atlas Tuition Center</p>
                    <p>No. 7A, Jln Rantau Panjang,</p>
                    <p>Rantau Panjang,</p>
                    <p>42100 Klang</p>
                    <p>Selangor</p>
                    <p>Contact : +60174447959</p>
                </div>
            </td>
            <td>
                <div>
                    <p>{{ $student->name }}</p>
                    <p>{{ $student->address }}</p>
                    <p>Contact : {{ $student->phone_number }}</p>
                </div>
            </td>
        </tr>
    </table>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Subject Name</th>
            <th class="w-50">Price</th>
        </tr>
        @foreach ($data as $subject)            
        <tr align="center">
            <td>{{ $subject->subject_name }}</td>
            <td>RM {{ $subject->price }}</td>
        </tr>
        @endforeach

        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>RM {{ $data->sum('price') }}.00</p>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
</div>
</html>