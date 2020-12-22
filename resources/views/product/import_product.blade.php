@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('export') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>Download Xlsx</a>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Products Import</h3></div>
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
                                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                        	@csrf
                                            
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"> Xlsx File Import</label>
                                                <input type="file" name ="import_file" required="" />
                                            </div>      
                                            
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary">Upload</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

@endsection