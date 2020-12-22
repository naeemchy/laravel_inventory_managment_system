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
        
    @guest
                            
    @else
         <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('home') }}">Mitaly Store</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion" style="background: #E7EAED">
                    <div class="sb-sidenav-menu">

                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('inbox') }}">Inbox</a>
                                </nav>
                            </div>
                           <a class="nav-link collapsed" href="{{ route('pos') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                POS
                                
                            </a>                                
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        <i class="fa fa-address-book" id="font"></i>Employees
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('add.employe') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add Employees</a>
                                            <a class="nav-link" href="{{ route('all.employe') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>
                                            All Employees</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        <i class="fa fa-address-book" id="font"></i>Customers
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('add.customer') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add Customers</a>
                                            <a class="nav-link" href="{{ route('all.customer') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Customers</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                       <i class="fa fa-address-book" id="font"></i> Supplyers
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('add.supplier') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add Supplyers</a>
                                            <a class="nav-link" href="{{ route('all.supplier') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>all Supplyers</a>
                                        </nav>
                                    </div>
                                    
                                </nav>
                            </div>
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                       <i class="fa fa-address-book" id="font"></i> Salaries(Emp.) 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('add.advanced_salaries') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>add advance Salary</a>
                                            <a class="nav-link" href="{{ route('all.advanced_salaries') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>all advance Salaries</a>
                                            <a class="nav-link" href="{{ route('pay.salaries') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Pay Salary</a>
                                            <a class="nav-link" href=""><i class="fa fa-plus" aria-hidden="true" id="font"></i>last month Salaries</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth1" aria-expanded="false" aria-controls="pagesCollapseAuth1">
                                       <i class="fa fa-address-book" id="font"></i> Category
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth1" aria-labelledby="headingOne" data-parent="#pagesCollapseAuth1">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('add.category') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>add Category</a>
                                            <a class="nav-link" href="{{ route('all.category') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>all Category</a>

                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth2" aria-expanded="false" aria-controls="pagesCollapseAuth2">
                                       <i class="fa fa-address-book" id="font"></i> Product
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth2" aria-labelledby="headingOne" data-parent="#pagesCollapseAuth2">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('add.product') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>add Product</a>
                                            <a class="nav-link" href="{{ route('all.product') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>all Product</a>
                                            <a class="nav-link" href="{{ route('import.product') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Import Product</a>

                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth3" aria-expanded="false" aria-controls="pagesCollapseAuth3">
                                       <i class="fa fa-address-book" id="font"></i> Expense
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth3" aria-labelledby="headingOne" data-parent="#pagesCollapseAuth3">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('add.expense') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add New Expense</a>
                                            <a class="nav-link" href="{{ route('today.expense') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Today Expense</a>
                                             <a class="nav-link" href="{{ route('monthly.expense') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Monthly Expense</a>
                                             <a class="nav-link" href="{{ route('yearly.expense') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Yearly Expense</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth4" aria-expanded="false" aria-controls="pagesCollapseAuth4">
                                       <i class="fa fa-address-book" id="font"></i> Attendance
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth4" aria-labelledby="headingOne" data-parent="#pagesCollapseAuth4">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('take.attendance') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Take Attendance</a>
                                            <a class="nav-link" href="{{ route('all.attendance') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>all Attendance</a>
                                            <a class="nav-link" href="#"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Monthly Attendance</a>

                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth5" aria-expanded="false" aria-controls="pagesCollapseAuth5">
                                       <i class="fa fa-address-book" id="font"></i> Settings
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth5" aria-labelledby="headingOne" data-parent="#pagesCollapseAuth5">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('settings') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Settings</a>                                        
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth6" aria-expanded="false" aria-controls="pagesCollapseAuth6">
                                       <i class="fa fa-address-book" id="font"></i> Orders
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth6" aria-labelledby="headingOne" data-parent="#pagesCollapseAuth6">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('panding.orders') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Pending Orders</a>
                                            <a class="nav-link" href="{{ route('success.orders') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Success Orders</a>                                        
                                        </nav>
                                    </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">                              
                                     
    @endguest
                    

            <main class="py-4">
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
            </footer>
            </div> 
        </div> 
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
