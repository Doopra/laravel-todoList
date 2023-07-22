@extends('layouts.app')

@section('styles')
<style>
#outer{
    width:30%;
    text-align:center;
}
.inner{
    display: inline-block;
}
</style>
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('alert-success')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif


                    <a class="btn btn-sm btn-info" href="{{route('todos.create')}}"> Create Task</a>

                    @if(count($todos) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Completed</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                            <tr>
                            <th scope="row">{{ $todo->title}}</th>
                            <td>{{ $todo->description}}</td>

                            <td>
                            @if($todo->is_completed ==1)
                                <a href="" class="btn btn-sm btn-success">completed</a>
                            @else
                            <a href="" class="btn btn-sm btn-danger">Not Done</a>
                            @endif
                            </td>
                            <td id="outer">
                             
                                <a href="{{ route('todos.show',$todo->id) }}" class=" inner btn btn-sma btn-info">View</a>
                                <a href="{{ route('todos.edit',$todo->id) }}" class="inner btn btn-sm btn-secondary">Edit</a>
                                
                                    <form method="post"action="{{ route('todos.destroy')}}" class="inner">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="todo_id" value="{{ $todo->id}}">
                                        <input type="submit" class="btn btn-info" value="delete">
                                    </form>
                                </td>
                            
                           
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h4> No task created yet</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
