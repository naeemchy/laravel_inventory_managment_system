@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All Attendances
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('take.attendance') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add Attendances</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                                $si=1;
                                            ?>
                                            @foreach($all_attend as $row)
                                            <tr>
                                                <td>{{ $si++ }}</td>
                                                <td>{{ $row->edit_date }}</td>

                                          
                                                <td>                                         
                                                    <a href="{{URL::to("/edit-attendance/".$row->edit_date)}}" class="btn btn-success">Edit</a>
                                                    <a href="{{URL::to("/delete-attendance/".$row->edit_date)}}" class="btn btn-danger" id="delete">Delete</a>
                                                    <a href="{{URL::to("/view-adattennce/".$row->edit_date)}}" class="btn btn-info">View</a>
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