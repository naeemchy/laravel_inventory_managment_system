@extends('layouts.app')
@section('content')
                <main>
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                All Category
                                <a class="pull-right btn btn-sm btn-success" href="{{ route('add.category') }}"><i class="fa fa-plus" aria-hidden="true" id="font"></i>Add Category</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($all_category as $row)
                                            <tr>
                                                <td>{{ $row->cat_name }}</td>
                                                <td>{{ $row->created_at }}</td>

                                          
                                                <td>                                         
                                                    <a href="{{URL::to("/edit-catedory/".$row->id)}}" class="btn btn-success">Edit</a>
                                                    <a href="{{URL::to("/delete-catedory/".$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
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