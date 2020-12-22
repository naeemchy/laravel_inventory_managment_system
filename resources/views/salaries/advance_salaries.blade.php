@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('all.advanced_salaries') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All advance salary</a>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-info"><h3 class="text-center font-weight-light my-4">Add Employ advance salary</h3></div>
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
                                        <form action="{{ url('/insert-advance-salary') }}" method="POST" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Employ Name</label>
                                                @php
                                                    $emp = DB::table('employees')->get();
                                                @endphp    
                                                <select name="emp_id" class="form-control">
                                                      <option selected=""></option>  
                                                    @foreach($emp as $row)    
                                                      <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                  
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Month</label>
                                                <select name="month" class="form-control">
                                                      <option value="January">January</option>
                                                      <option value="February">February</option>
                                                      <option value="March">March</option>
                                                      <option value="April">April</option>
                                                      <option value="May">May</option>
                                                      <option value="June">June</option>
                                                      <option value="July">July</option>
                                                      <option value="August">August</option>
                                                      <option value="September ">September </option>
                                                      <option value="October ">October </option>
                                                      <option value="November ">November </option>
                                                      <option value="December ">December </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"> year</label>
                                                <input class="form-control py-4" type="text" name ="year" placeholder="Enter year" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Advance Salary</label>
                                                <input class="form-control py-4" type="text" name ="advanced_salary" placeholder="Enter advanced salary" />
                                            </div>
                                            
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary">Add Employ Salary</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

@endsection