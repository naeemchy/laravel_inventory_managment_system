@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Pay Salary : {{date("F Y")}}
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('add.advanced_salaries') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add advance salary</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Emp. Name</th>
                                                <th>Salary</th>
                                                <th>Advance pay</th>
                                                <th>Month</th> 
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- return advanced salary of employes -->
                                        @php
                                        	$month = date("F",strtotime('-1 month'));
											$pay_salaries = DB::table('advance_salaries')
				        				      ->join('employees','advance_salaries.emp_id','employees.id')		
				        				      ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
				        				      ->where('month',$month)
				        					  ->get(); 
                                        @endphp

                                        <tbody>
                                            @foreach($employee as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->salary }}</td>
                                                <td></td>
                                                <td><span class="badge badge-success">{{ date("F",strtotime('-1 month')) }}</span></td>
                                              
                                                <td><img src="{{ $row->photo }}" style="height: 80px;width: 80px"></td>
                                          
                                                <td>                                         
                                                    <a href="" class="btn btn-sm btn-info">Pay Now</a>
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


@endsection