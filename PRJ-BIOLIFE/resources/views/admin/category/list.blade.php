@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                DataTable Category
            </div>
            <a href="{{ route('admin.category.add') }}" class="btn btn-link text-success px-3 mb-0"><i class="material-icons text-sm me-2">add</i>Add</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name Category</th>
                        <th>Icon Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($category as $cate)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{  $cate->nameCategory	}}</td>
                        <td>
                            <i class="{{ $cate->iconCategory }}" style="font-size: 26px"></i></td>
                        <td>
                            <form action="{{ route('admin.category.delete', $cate->idCategory) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="return confirm('Are you sure?')"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{route('admin.category.edit',$cate->idCategory)}}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            </form>
                        </td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
                      