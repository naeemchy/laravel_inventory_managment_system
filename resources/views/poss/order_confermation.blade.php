@extends('layouts.app')
@section('content')
<div class="container">
  <style type="text/css">
      
/* =============================================================
   GENERAL STYLES
 ============================================================ */

.pad-top-botm {
    padding-bottom:40px;
}
h4 {
    text-transform:uppercase;
}
/* =============================================================
   PAGE STYLES
 ============================================================ */

.contact-info span {
    font-size:14px;
    padding:0px 10px 0px 10px;
}

.contact-info hr {
    margin-top: 0px;
margin-bottom: 0px;
}

.client-info {
    font-size:15px;
}

.ttl-amts {
    text-align:right;
    padding-right:50px;
}
  </style>   
      <div class="row pad-top-botm ">
         <div class="col-lg-4 col-md-6 col-sm-6 col-offset-2">
           <img src="{{ URL::to($order->photo) }}" name="photo" style="height: 100px;width: 100px;border-radius: 50%;float:right;">  
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>Customer Name : {{ $order->name }}</strong>
              <br>
              <i>Shop Name : </i>{{ $order->shopname }}
              <br>
                  <i>Address : </i>{{ $order->address }}
              <br>
                  <i>City : </i>{{ $order->city }}
              <br>
                  <i>Bank Name : </i>{{ $order->bank_name }}
              
         </div>
     </div>
     <div class="row contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr>
             <span>
                 <strong>Email : </strong>  {{ $order->email }}
             </span>
             <span>
                 <strong>Call : </strong>  {{ $order->phone }}
             </span>
              <span>
                 <strong>Order Date : </strong> {{ $order->order_date }}
             </span>
             <span>
                @if($order->order_status == 'success')
                 <strong>Order Status : </strong> <span class="badge badge-secondary p-1 bg-success">Success</span>
                @else 
                 <strong>Order Status : </strong> <span class="badge badge-secondary p-1 bg-danger">Panding</span>
                @endif 
             </span>
             <span>
                 <strong>Order Id : </strong> {{ $order->id }}
             </span>
             <hr>
         </div>
     </div><br>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                             @foreach($order_details as $cont)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $cont->product_name }}</td>
                                    <td>{{ $cont->product_name }}</td>
                                    <td>{{ $cont->quantity }}</td>
                                    <td>{{ $cont->unicost }}</td>
                                    <td>{{ $cont->unicost*$cont->quantity }}</td>
                                </tr>
                            @endforeach   
                                
                            </tbody>
                        </table>
               </div>
             <hr>
             <div class="ttl-amts">
               <h5>  Total Amount : {{ $order->sub_total }} </h5>
             </div>
             <hr>
              <div class="ttl-amts">
                  <h5>  Tax : {{ $order->vat }} </h5>
             </div>
             <hr>
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : {{ $order->total }}</strong> </h4>
             </div>
         </div>
     </div><br><br>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong><br><br>
             <div>
               <h5>  Total Pay : {{ $order->pay }} </h5>
             </div>
             <hr>
              <div>
                  <h5> Remaining Pay : {{ $order->due }} </h5>
             </div>
             <hr>
              <div>
                  <h4> <strong>Payment By : {{ $order->payment_status }}</strong> </h4>
             </div>
             </div>
         </div>
       @if($order->order_status == 'success')  
       @else
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr>
             <a onclick="window.print()" class="btn btn-primary btn-lg">Print Invoice</a>
             &nbsp;&nbsp;&nbsp;
              <a href="{{ URL::to('/pos-done/'.$order->id) }}" class="btn btn-success btn-lg">Done</a>

             </div>
      </div>
      @endif
 </div>

@endsection