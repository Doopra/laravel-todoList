@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show Todo') }}</div>
                <a class="btn btn-primary" href="{{ url()->previous() }}">Go Back</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b> Your todo title is: </b> {{$todo->title}}
                    <br><br><b> Your todo description is: </b> {{$todo->description}}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
