@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Horizontal Menu</li>
            </ol>
        </nav>
    </div>
    <div class="row header-admin">
        <div>
            <h1 class="h3 mb-0 text-gray-800 ml-3">List Horizontal Menu</h1>
        </div>
        <div>
            <a href="{{ route('PageCreateHorizontal') }}"><Button class="btn btn-primary">ADD</Button></a>
        </div>
    </div>
    <div class="row mt-5">
        <table class="table table-sm mx-5" id="dataTables-example">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Slug Menu</th>
                <th>IdElement</th>
                <th>Animation</th>
                <th>Delay</th>
                <th>Trạng Thái</th>
                <th>Setting</th>
            </thead>
            @foreach ($items as $item)
                <tbody>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->namemenu }}</td>
                    <td>{{ $item->slugmenu }}</td>
                    <td>{{ $item->idelement }}</td>
                    <td>{{ $item->HozAnimation->name}}</td>
                    <td>{{$item->HozDelay->name}}</td>
                    <td>
                        <input type="checkbox" class="toggle-class" data-id="{{ $item->id }}" data-toggle="toggle"
                        data-style="slow" data-on="Enabled"
                        data-off="Disabled"{{ $item->status == true ? 'checked' : '' }}>
                    </td>
                    <td>
                        <div class="controll-item">
                            <form action="{{ route('delete_horizontal', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="control-delete"><i class="fa-solid fa-trash-can"></i></button>&nbsp;&nbsp;
                            </form>
                            <form action="{{ route('edit_horizontal', $item->id) }}">
                                <button class="control-setting"><i class="fa-solid fa-gear"></i></button>
                            </form>
                        </div>
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>
  
@endsection
