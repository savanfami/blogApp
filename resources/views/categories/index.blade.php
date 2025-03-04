@extends('layout.index')

@section('main')
<div class="container col-md-8" style="margin-top: 100px;">
    <h2 class="text-center mb-4">Create Category</h2>

    @if (Session('status'))
        <p class="alert alert-success">{{ Session('status') }}</p>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table id="myTable" class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                    
                </thead>
                <tbody>
                    @foreach ($allCategory as $cat )
                    
                 
                    <tr>
                        <td>{{$cat->name}}</td>
                        <td><a href="{{ route('category.edit',$cat) }}" class="btn btn-sm btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('category.delete',$cat) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('categories.create') }}" class="mt-3 btn btn-primary">Create Category</a>
        </div>
    </div>
</div>
@endsection
