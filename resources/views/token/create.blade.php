@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    

                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_create_token" action="{{  route('token.store') }}" method="post" >
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="">Token Name</label>
                                    <input type="text" name="token_name" class="form-control" required>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="">Premade Abilities</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Choose ...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name  }}({{ $user->email  }})</option> 
                                        @endforeach
                                    </select>
                                </div> --}}

                                
                            </form>
                        </div>
                        
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <h3 class="h3">Scopes/Abilities</h3>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10%">Action</th>
                                        <th>Table name</th>
                                        <th>Access</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($abilities as $ability)
                                        <tr>
                                            <td class="text-center">
                                                <input form="form_create_token" type="checkbox" name="abilities[]"class="" value="{{ $ability->name }}">
                                            </td>
                                            <td>
                                                {{ $ability->table_name }}
                                            </td>
                                            <td>
                                                {{ $ability->name }}
                                            </td>
                                            <td>
                                                {{ $ability->details }}
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" form="form_create_token" class="btn btn-primary">
                                    Generate Token
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
