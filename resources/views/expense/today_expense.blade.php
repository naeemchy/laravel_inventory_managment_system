@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">

                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Today Expense
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('add.expense') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add New</a>
                            </div><br>
                            @php
                            $date = date("d/m/y");
    						$amount = DB::table('expenses')->where('date',$date)->sum('amount');
                            @endphp
                            <h4>Total: {{ $amount }}TK</h4>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($today as $row)
                                            <tr>
                                                <td>{{ $row->details }}</td>
                                                <td>{{ $row->amount }}</td>
                                                <td>{{ $row->date }}</td>

                                          
                                                <td>                                         
                                                    <a href="{{URL::to("/edit-today-expense/".$row->id)}}" class="btn btn-success">Edit</a>
                                                    <a href="{{URL::to("/delete-today-expense/".$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
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