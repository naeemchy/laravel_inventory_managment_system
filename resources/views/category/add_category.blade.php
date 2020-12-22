@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('all.category') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Category</a>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Category</h3></div>
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
                                        <form action="{{ url('/insert-category') }}" method="POST">
                                        	@csrf
                                            
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"> Category Name</label>
                                                <input class="form-control py-4" type="text" name ="cat_name" placeholder="Enter Category Name" />
                                            </div>      
                                            
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary">Add Category</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

@endsection