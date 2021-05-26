@extends('layouts.app')

@section('content')
<div class="d-flex  justify-content-center pb-5">
    <div class="m-auto"><h1 class="ml-5">Faculty List</h1></div>
    
    <div class="m-auto">
      <a class="navbar-brand" href="{{ url('/faculties/create') }}">
          {{ 'Add New Faculty'}}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    
    
</div>

<div class="container">
    <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Faculty Name</th>
            <th scope="col">Email</th>
            <th scope="col">Designation</th>
            <th scope="col">Department</th>
          </tr>
        </thead>
        <tbody>
           @forelse ($faculties as $faculty )
           <tr>
            <td>{{ $faculty->name }}</td>
            <td>{{ $faculty->email }}</td>
            <td>{{ $faculty->designation }}</td>
            <td>{{ $faculty->dept }}</td>
          </tr> 
           @empty
            <p> <strong>No Faculty To Display</strong></p>   
           @endforelse 
        </tbody>
      </table>
      <div class="d-flex">
        {{ $faculties->links() }}
      </div>
      
</div>

@endsection