<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ URL::asset('admin/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/css/mystyle.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
</head>
<body class="sb-nav-fixed">
    <div id="app">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('pos_home') }}">Mitaly Store</a>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                    <div class="input-group-append">
                        <a class="" href="{{ route('login') }}">Login</a>
                    </div>
            </div>

        </nav>
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
                        
                     <div class="col-lg-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
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
                               
                                <td>
                                    {{ $row->buying_price }}
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
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('admin/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('admin/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{ URL::asset('admin/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('admin/assets/demo/datatables-demo.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      $(document).on("click","#delete",function(e){
        e.preventDefault();
        var link = $(this).attr('href');
          swal({
           title: "Are you want to delete?",
           text: "Once delete, it will be permanently delete!",
           icon: "warning",
           buttons: true,
          dangerMode: true,
         })
         .then((willDelete) => {
          if (willDelete){
            window.location.href = link;
          }else{
            swal("Safe Data");
          }
         });
      });
    </script>
</body>
</html>     