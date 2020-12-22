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
           <img src="{{ URL::to($customer->photo) }}" name="photo" style="height: 100px;width: 100px;border-radius: 50%;float:right;">  
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>Customer Name : {{ $customer->name }}</strong>
              <br>
             <!--  <i>Shop Name : </i>{{ $customer->shopname }} -->
              <i>Shop Name : </i>Mitaly Store	
              <br>
                  <i>Address : </i>{{ $customer->address }}
              <br>
                  <i>City : </i>{{ $customer->city }}
              <br>
                  <i>Bank Name : </i>{{ $customer->bank_name }}
              
         </div>
     </div>
     <div class="row contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr>
             <span>
                 <strong>Email : </strong>  {{ $customer->email }}
             </span>
             <span>
                 <strong>Call : </strong>  {{ $customer->phone }}
             </span>
              <span>
                 <strong>Order Date : </strong> {{ date("l jS \of F Y h:i:s A") }}
             </span>
             <span>
                 <strong>Order Status : </strong> <span class="badge badge-secondary p-1">Pending</span>
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
                                    <th>Name</th>
                                    <th>Quantity.</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                             @foreach($contants as $cont)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $cont->name }}</td>
                                    <td>{{ $cont->qty }}</td>
                                    <td>{{ $cont->price }}</td>
                                    <td>{{ $cont->price*$cont->qty }}</td>
                                </tr>
                            @endforeach   
                                
                            </tbody>
                        </table>
               </div>
             <hr>
             <div class="ttl-amts">
               <h5>  Total Amount : {{ Cart::subtotal() }} </h5>
             </div>
             <hr>
              <div class="ttl-amts">
                  <h5>  Tax : {{ Cart::tax() }} </h5>
             </div>
             <hr>
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : {{ Cart::total() }}</strong> </h4>
             </div>
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
                    This is an electronic generated invoice so doesn't require any signature.

                 </li>
                 <li>
                     Please read all terms and polices on  www.yourdomaon.com for returns, replacement and other issues.

                 </li>
             </ol>
             </div>
         </div>
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr>
             <a onclick="window.print()" class="btn btn-primary btn-lg">Print Invoice</a>
             &nbsp;&nbsp;&nbsp;
              <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-lg">Submit</a>

             </div>
         </div>
 </div>
 <!-- add invoice modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger p-0 m-0">
                        @foreach ($errors->all() as $error)
                            <p class="pt-2">{{ $error }}</p>
                        @endforeach
                </div>
            @endif
            <form action="{{ url('/final-invoice') }}" method="POST">
                @csrf
                <h3 class="text-center">Invoice Of : <span class="badge badge-success p-1">{{$customer->name}}</span></h3> 
                <h4 class="text-center">Total : <span class="badge badge-success p-1">{{ Cart::total() }}</span></h4> 
                <div class="row">

                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Payment</label>
                    <select class="custom-select form-control" name="payment_status">
                    	  <option value="Cheque">Bkash</option>
                          <option value="HandKash">Handcash</option>
                          <option value="Cheque">Cheque</option>
                          <option value="Due">Due</option>
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Pay</label>
                    <input class="form-control" type="text" name ="pay" placeholder="Enter pay" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Due</label>
                    <input class="form-control" type="text" name ="due" placeholder="Enter Due" />
                </div>
                </div>
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <input type="hidden" name="order_date" value=" {{ date('d/m/y' ) }}">
                    <input type="hidden" name="order_status" value="pending">
                    <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                    <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                    <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                    <input type="hidden" name="total" value="{{ Cart::total() }}">
                </div>
                 <div class="">
                    <button class="btn btn-primary">Submit</button> 
                </div>
            </form>
        </div>

    </div>
  </div>
</div>
@endsection