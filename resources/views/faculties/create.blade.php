@extends('layouts.app')

@section('content')
<div class="container col-5 m-auto pb-5">
    <h1>Add New Faculty</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-7 m-auto">
            <form action="/faculties" method="post" class="col-lg-7">
                @csrf
                <div class="form-group">
                  <label for="name">Faculty Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"  placeholder="Enter faculty name">
                  @error('name')
                      <p style="color: red">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"   required autocomplete="current-password">
                    @error('password')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <select name="designation" value="{{ old('designation') }}" class="form-control" id="designation">
                        <option value="none"></option>
                        <option value="Assistant Professor">Assistant Professor</option>
                        <option value="Associate Professor">Associate Professor</option>
                        <option value="Professor">Professor</option>
                        <option value="Lecturer">Lecturer</option>
                    </select>
                    @error('designation')
                      <p style="color: red">{{ $message }}</p>
                    @enderror
                  </div>
                
                  
                  <button type="submit" class="btn btn-primary ali">Submit</button>
                
                  
              </form>
        </div>
</div>

</div>

@endsection
