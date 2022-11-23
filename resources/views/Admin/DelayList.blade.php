@extends('Layout/AdminLayout')
@section('content')
@endphp
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Delay</li>
            </ol>
        </nav>
    </div>
    <div class="row header-admin">
        <div>
            <h1 class="h3 mb-0 text-gray-800 ml-3">List Delay</h1>
        </div>
        <div>
            <a href="{{route('PageDelayAdd')}}"><Button class="btn btn-primary">ADD</Button></a>
        </div>
    </div>
    <div class="row mt-5">
        <table class="table table-sm mx-5" id="dataTables-example">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Trạng Thái</th>
                <th>Setting</th>
            </thead>
            @foreach ($delays as $item)
                <tbody>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <input type="checkbox" class="toggle-delay" data-id="{{ $item->id }}" data-toggle="toggle"
                        data-style="slow" data-on="Enabled"
                        data-off="Disabled"{{ $item->status == true ? 'checked' : '' }}>
                    </td>
                    <td>
                        <div class="controll-item">
                            <form action="{{ route('delete_delay', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="control-delete"><i class="fa-solid fa-trash-can"></i></button>&nbsp;&nbsp;
                            </form>
                            <form action="{{ route('edit_delay', $item->id) }}">
                                <button class="control-setting"><i class="fa-solid fa-gear"></i></button>
                            </form>
                        </div>
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>
  
@endsection
