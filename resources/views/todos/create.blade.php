@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('create') }}</div>

                <div class="card-body">
                 
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                 <form method="post" action="{{ route('todos.store')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-lable">Title</label>
                        <input type="text" class="form-control" name="title"  placeholder="Enter the title">
                        
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-lable">Description</label>
                    <textarea name="description" class="form-control" cols="5" rows="5">

                    </textarea>

                    </div>
                   
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
