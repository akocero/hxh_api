@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <label for="">Make sure to copy your new personal access token now. You won’t be able to see it again!</label> <br>
                    Personal access token:
                    <div class="alert alert-success" role="alert">
                        
                        {{ $id }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
