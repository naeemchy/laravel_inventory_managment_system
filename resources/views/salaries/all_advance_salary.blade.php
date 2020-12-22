@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All advance salary List
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
                                                <th>Pay Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($all_advance_salary as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->salary }}</td>
                                                <td>{{ $row->advanced_salary }}</td>
                                                <td>{{ $row->month }}</td>
                                                <td><img src="{{ $row->photo }}" style="height: 80px;width: 80px"></td>
                                                <td>{{ $row->updated_at }}</td>
                                          
                                                <td>                                         
                                                    <a href="{{URL::to("/edit-advance-salary/".$row->id)}}" class="btn btn-success">Edit</a>
                                                    <a href="{{URL::to("/delete-advance-salary/".$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
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