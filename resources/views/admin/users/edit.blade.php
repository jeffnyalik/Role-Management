@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User {{$user->name }}</div>

                <div class="card-body">
                  <form action="{{route('admin.users.update', $user)}}" method="post">
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    {{method_field('PUT')}}
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]"
                                    @if ($user->roles->pluck('id')->contains($role->id))
                                        checked
                                    @endif
                                    value="{{$role->id}}" >
                                <label for="roles">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded-0" style="margin-left:48px;">Update</button>
                    
                    <a href="{{route('admin.users.index')}}" class="btn btn-info btn-sm rounded-0">Go Back</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection