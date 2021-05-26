@extends('layouts.app')

@section('content')
    <div class="d-flex  justify-content-center pb-5">


        <div class="m-auto">
            <h1 class="ml-5">Publication List</h1>
        </div>

        <div class="m-auto">
            <a class="navbar-brand" href="{{ url('/publications/create') }}">
                {{ 'Add New Publication' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>


    </div>

    @if (!is_null($publications) && !$publications->isEmpty())
        <div class="container">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Published</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($publications as $publication )
                        <tr>
                            <td>{{ $publication->title }}</td>
                            <td>{{ $publication->category }}</td>
                            <td>{{ $publication->publication_date }}</td>
                        </tr>
                    @empty
                        <p> <strong>No Faculty To Display</strong></p>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex">
                {{ $publications->links() }}
            </div>

        </div>

    @else

    @endif

@endsection
