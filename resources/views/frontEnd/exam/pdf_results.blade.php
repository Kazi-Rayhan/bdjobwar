<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @page {
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }
        @font-face {
             font-family: "Nikosh";
            src: url({{asset('Nikosh.ttf')}});
        }

        body {
            /* margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm; */
            font-family: "Nikosh";
          
        }

        .cus-info {
            /* margin: 20px 0 20px 40px; */
            font-size: 30px;
            /* background: green;
            padding:5px;
            color:white; */
        }


        
        table.content{
            width:100%;
            border-collapse: collapse;
            padding:0;
            /* margin-left:30px; */
            font-size: 12px;
            line-height: 1.4;
        }

       .content th{
        border: solid 1px #000000;
        text-align: center;
        padding: 5px;
        
     
       }

     .content .row td{
    border: solid 1px #000000;
    text-align: center;
    padding: 5px;


    }
    .content.thead{
        background-color:#4e73df;
        color:white;
    }

      

 

    </style>
    <title>Results</title>
</head>

<body>
  
    <div class="">
   
      <table class="content">
         <tr >

                <th>
                Position
                </th>
                <th>
                Name
                </th>
                <th>
                Roll
                </th>
                <th>
                Correct Answers
                </th>
                <th>
                Wrong Answers
                </th>
                <th>
                Total
                </th>      
         </tr>
         @foreach($results as $pos => $result)
         <tr class="row">
         <td>
                     {{$result->exam->getRanking($result->user)}}
                </td>
             
                <td>
          
                    {{$result->user->name}}
                </td>
             
                <td>
                    {{@$result->user->information->id}}
                </td>
                <td>
                {{count((array) json_decode($result->answers)) - ($result->wrong_answers )}}
                
                </td>
                <td>
                {{$result->wrong_answers}}
                </td>
                
                <td>
                    {{$result->total}}
                </td>
                
         </tr>
         @endforeach
    
  
   
      </table>
    </div>
   
</body>

</html>