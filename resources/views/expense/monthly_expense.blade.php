@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">

                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                 @php
                                    $month = date("F");
                                    
                                 @endphp
                                All Expense {{ date("Y") }}
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('add.expense') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add New Expense</a>
                            </div><br>
                            <div>
                                <a href="{{ route('january.expense') }}" class="btn btn-sm btn-success">January</a>
                                <a href="{{ route('february.expense') }}" class="btn btn-sm btn-success">February</a>
                                <a href="{{ route('march.expense') }}" class="btn btn-sm btn-success">March</a>
                                <a href="{{ route('april.expense') }}" class="btn btn-sm btn-success">April</a>
                                <a href="{{ route('may.expense') }}" class="btn btn-sm btn-success">May</a>
                                <a href="{{ route('june.expense') }}" class="btn btn-sm btn-success">June</a>
                                <a href="{{ route('july.expense') }}" class="btn btn-sm btn-success">July</a>
                                <a href="{{ route('augest.expense') }}" class="btn btn-sm btn-success">Augest</a>
                                <a href="{{ route('september.expense') }}" class="btn btn-sm btn-success">September</a>
                                <a href="{{ route('octber.expense') }}" class="btn btn-sm btn-success">Octber</a>
                                <a href="{{ route('november.expense') }}" class="btn btn-sm btn-success">November</a>
                                <a href="{{ route('december.expense') }}" class="btn btn-sm btn-success">December</a>
                            </div><br>
                            @php
                            $month = date("F");
                            $year = date("Y");
                            $amount = DB::table('expenses')->where('month',$month)->where('year',$year)->sum('amount');

                            @endphp

                            
                            <h4>Total Monthly Expense: {{ $amount }}TK</h4>
                           

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Month</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($monthly as $row)
                                            <?php if ($year==$row->year): ?>
                                            <tr>
                                                <td>{{ $row->details }}</td>
                                                <td>{{ $row->amount }}</td>
                                                <td>{{ $row->date }}</td>
                                                 <td>{{ $row->month }}</td>   
                                                
                                                

                                          
                                                <td>                                         
                                                    <a href="{{URL::to("/edit-today-expense/".$row->id)}}" class="btn btn-success">Edit</a>
                                                    <a href="{{URL::to("/delete-today-expense/".$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endif ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


@endsection