@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $user->name }}</div>

                <div class="card-body">
                   
                  <form action="{{ route('admin.users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="roles">Roles:</label>
                      @foreach ($roles as $role)
                      <div class="form-check">
                        
                        <input type="checkbox" name="roles[]" 
                        value="{{ $role->id }}" 
                        @if ($user->roles->pluck('id')->contains($role->id))
                            checked
                        @endif >
                        <label>{{ $role->name }}</label>
                      </div>
                    @endforeach
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
