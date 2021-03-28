@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @foreach ($personal_access_tokens as $personal_access_token)
                        {{ $personal_access_token->name }} <br>
                        {{-- {{ $personal_access_token->abilities }} --}}
                        @foreach ($personal_access_token->abilities as $ability)
                            {{ $ability }} <br>
                        @endforeach
                        <br>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
