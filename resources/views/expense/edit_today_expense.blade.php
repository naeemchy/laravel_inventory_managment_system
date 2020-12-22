@extends('layouts.app')
@section('content')
 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><a class="pull-right btn btn-sm btn-success" href="{{ route('today.expense') }}"><i class="fa fa-eye-slash" aria-hidden="true" id="font"></i>All Expense</a><h3 class="text-center font-weight-light my-4">today expense Update</h3></div>
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
                                        <form role="form" action="{{ url('/update-today-expense/'.$edit->id) }}" method="post">
                                        @csrf
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Details</label>
                                                <input class="form-control py-4" type="text" name ="details" value="{{ $edit->details }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Amount</label>
                                                <input class="form-control py-4" type="text" name ="amount" value="{{ $edit->amount }}"/>
                                            </div>
                                           
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Update Today Expense</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


@endsection