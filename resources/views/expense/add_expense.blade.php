@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                              <div class="pull-left">                              
                                <a class="btn btn-sm btn-success" href="{{ route('today.expense') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Today Expense</a>
                              </div>
                              <div class="pull-right">
                                <a class="btn btn-sm btn-success" href="{{ route('monthly.expense') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Montly Expense</a>
                                <a class="btn btn-sm btn-success" href="{{ route('yearly.expense') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Yearly Expense</a>
                              </div>  
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Expense</h3></div>
                                    @if ($errors->any())
                  									    <div class="alert alert-danger">
                  									        <ul>
                  									            @foreach ($errors->all() as $error)
                  									                <li>{{ $error }}</li>
                  									            @endforeach
                  									        </ul>
                  									    </div>
                  									@endif

                                    <div class="card-body">
                                        <form action="{{ url('/insert-expense') }}" method="POST">
                                        	@csrf
                                            
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"> Expense Name</label>
                                                <input class="form-control py-4" type="text" name ="details" placeholder="Enter Expense Name" />
                                            </div>  
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Amount</label>
                                                <input class="form-control py-4" type="text" name ="amount" placeholder="Enter Amount" />
                                            </div>  
                                             <div class="form-group">
                                                <input class="form-control py-4" type="hidden" name ="date" value="{{ date("d/m/y") }}"/>
                                            </div>   
                                              <div class="form-group">
                                                <input class="form-control py-4" type="hidden" name ="month" value="{{ date("F") }}" />
                                            </div> 
                                             <div class="form-group">
                                                <input class="form-control py-4" type="hidden" name ="year" value="{{ date("Y") }}" />
                                            </div>     
                                            
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary">Add Expense</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

@endsection