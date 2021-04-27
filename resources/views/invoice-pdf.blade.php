<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
   
</head>
<body>

<center>
<a href="https://imgbb.com/"><img  src="https://i.ibb.co/q5hG1sV/Bazil-Books-Logo.png" alt="Bazil-Books-Logo" ></a>
</center>
<h4>Date: {{$invoice->created_at}}</h4>
<h4>Invoice# {{$invoice->invoiceId}}</h4>
    <br>
                                                {{$invoice->invoiceHasCustomer->customerName}}<br> 
                                                {{$invoice->invoiceHasCustomer->customerPhone}}<br> 
                                                {{$invoice->invoiceHasCustomer->customerEmail}}<br> 
                                                {{$invoice->invoiceHasCustomer->customerAddress}}<br> 


                                                <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Book Title</th>
                            <th>Price</th>
                                                     
                           
                        </tr>
                </thead>
                <tbody>
                @foreach($invoiceBooks as $row)
                        <tr>
                            <td>{{$row->quantity}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->price}}</td>
 
                        </tr>
                @endforeach
</table>


</body>
</html>