<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        .order-heading{
            color:#4e73df;
        }

        .cus-info {
            margin: 20px 0 20px 40px;
            font-size: 20px;
        }
        .order-title {
            text-align:center;
            font-size: 30px;
        }

        ul li {
            list-style: none;
            font-size: 17px;
            padding-top: 5px;

        }
        span {
            padding-left: 10px;
        }
        .data{
            font-weight: bold;
            color:#555;
        }
        table.content{
            width:100%;
            border-collapse: collapse;
            padding:0;
            margin-left:30px;
            font-size: 15px;
            line-height: 1.4;
        }

       .content th{
        border: solid 1px #000000;
        text-align: center;
        padding: 10px 0;
        
     
       }

     .content .row td{
    border: solid 1px #000000;
    text-align: center;
    padding: 15px 0;


    }
    .thead{
        background-color:#4e73df;
        color:white;
    }

      

 

    </style>
    <title>Order Information</title>
</head>

<body>
  

    <div class="">
        <h4 class="order-title"><span class="order-heading">Order</span> Invoice</h4>
    
    <div class="row">
        <div class="info">
            <h5 class="cus-info">Customer Information</h5>
            <ul class="list-group mb-3">
                <li class="list-group-item"><span class="data">Name :</span> <span>{{ Auth()->user()->name }}</span></li>
                <li class="list-group-item"><span class="data">phone :</span> <span>{{ Auth()->user()->phone }}</span></li>
          
            </ul>
        </div>

    </div>
    <div class="">
    <h5 class="cus-info">Service Information</h5>
      <table class="content">
         <tr class="thead">
            <th>Service Name</th>
            <th>Service price</th>
            <th>Service duration</th>
           
            <th>Order date</th>
      
         </tr>
         <tr class="row">
            <td>{{$order->orderable->title}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->orderable->duration}}</td>
            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M ,Y ') }} </td>
      
         </tr>
    
  
   
      </table>
    </div>
   
</body>

</html>