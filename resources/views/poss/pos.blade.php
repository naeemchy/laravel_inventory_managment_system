@extends('layouts.app')

@section('content')
<main>
    <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="pull-left">POS (Point Of Seals)</li>
                <li class="pull-right"> : {{ date('d/m/y' )}}</li>
            </ol>
           <!--  <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div>
                        <ul class="list-group list-group-horizontal-md">
                        @foreach($category as $row)
                        
                          <li class="btn btn-sm btn-success list-group-item"> <a href="#" data-filter="*" class="current">{{ $row->cat_name }}</a></li>
                       
                        @endforeach
                         </ul>
                    </div><br>
                </div>
            </div>   -->      
            <div class="row">               
                <div class="col-lg-6">
                   
                <div class="card text-center">
                 <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Price</th>
                      <th scope="col">Total</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @php
                    $cart_product = Cart::content()
                  @endphp
                  <tbody>
                     @foreach($cart_product as $prod)
                    <tr>
                       
                      <th scope="row">{{ $prod->name }}</th>
                      <td>
                        <form action="{{ url('/cart-update/'.$prod->rowId)}}" method="post">
                            @csrf
                        <input type="number" name="qty" value="{{ $prod->qty }}" style="width: 60px;">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                        </form>
                        </td>
                      <td>{{ $prod->price }}</td>
                      <td>{{ $prod->price*$prod->qty }}</td>
                      <td><a href="{{ url('/cart-remove/'.$prod->rowId)}}"><i class="fas fa-trash-alt text-danger"></i></a></td> 
                    </tr><br>
                      @endforeach
                    
                  </tbody>
                </table>
 
                       <div class="card-footer">
                        <h5 class="card-title">Quantity: {{ Cart::count() }}</h5>
                        <h5 class="card-title">SubTotal: {{ Cart::subtotal() }}</h5>
                        <h5 class="card-title">Vat : {{ Cart::tax() }}</h5><br>
                        <h5 class="card-title">Toral: {{ Cart::total() }}</h5>
                        </div><br>
                         <form method="post" action="{{ url('/create-invoice') }}">
                            @csrf
                           <div class="panel">
                            <h4 class="text-info">Select Customer
                            <span class="btn btn-sm btn-primary pull-right mr-2" data-toggle="modal" data-target="#exampleModal">Add New Customer</span>
                                </h4><br>
                                @if ($errors->any())
                                        <div class="alert alert-danger p-0 m-0">
                                                @foreach ($errors->all() as $error)
                                                    <p class="pt-2">{{ $error }}</p>
                                                @endforeach
                                        </div>
                                    @endif
                                <select class="form-control" name="cus_id">
                                    <option disabled="" selected="">select customer</option>
                                    @foreach($customer as $cus)
                                    <option value="{{  $cus->id }}">{{ $cus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                
                            <button type="submit" class="btn btn-success m-4">Create Invoice</button>
                            </form>
                    </div>

                    </div>
                        
                     <div class="col-lg-6">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($product as $row)
                            <tr>
                            <form action="{{ url('/add-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <input type="hidden" name="name" value="{{ $row->product_name }}">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="price" value="{{ $row->selling_price }}">
                                <td>
                        
                                    <img src="{{ URL::to($row->product_image) }}" width="60px" height="60px"></td>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ $row->cat_name }}</td>
                               
                                <td class="text-center">
                                    <button type="submit"><i class="fas fa-plus-square"></i></button>
                                </td>

                            </form>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
    </div>
</main>
<!-- add customer modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card-body">
            <form action="{{ url('/insert-customer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3 class="text-center">Add New Customer</h3> 
                <div class="row">

                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Name**</label>
                    <input class="form-control py-4" type="text" name ="name" placeholder="Enter Name" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input class="form-control py-4" type="email" name ="email" placeholder="Enter Email" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Phone**</label>
                    <input class="form-control py-4" type="text" name ="phone" placeholder="Enter Phone" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Address**</label>
                    <input class="form-control py-4" type="text" name ="address" placeholder="Enter Address" />
                </div>
                 </div>
                 <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Shopname</label>
                    <input class="form-control py-4" type="text" name ="shopname" placeholder="Enter Shopname" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Account Holder</label>
                    <input class="form-control py-4" type="text" name ="account_holder" placeholder="Enter account holder" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Account Number</label>
                    <input class="form-control py-4" type="text" name ="account_number" placeholder="Enter Account Number" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Bank Name</label>
                    <input class="form-control py-4" type="text" name ="bank_name" placeholder="Enter bank Name" />
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Bank Branch</label>
                    <input class="form-control py-4" type="text" name ="bank_branch" placeholder="Enter bank Branch" />
                </div> 
                </div>
                <div class="col-md-6"> 
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">City</label>
                    <input class="form-control py-4" type="text" name ="city" placeholder="Enter Employ City" />
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <img src="" id="image">
                    <label class="small mb-1" for="inputEmailAddress">Photo</label>
                    <input type="file" name ="photo" accept="image/*" class="upload" onchange="readURL(this);" required="" />
                </div>
                </div>
               
              
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary">Add Customer</button> 
                </div>
                </div>
            </form>
        </div>

    </div>
  </div>
</div>
<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
