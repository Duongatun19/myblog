@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Product</li>
            </ol>
        </nav>
    </div>
    <div class="row header-admin">
        <div>
            <h1 class="h3 mb-0 text-gray-800 ml-3">List Product</h1>
        </div>
        <div>
            <a href="{{ route('PageAddProduct') }}"><Button class="btn btn-primary">ADD</Button></a>

        </div>
    </div>
    <div class="row mt-5">
        <table class="table table-sm mx-5" id="dataTables-example">
            <thead>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Hình Ảnh</th>
                <th>Link</th>
                <th>Danh Mục</th>
                <th>Annimation</th>
                <th>Delay</th>
                <th>Trạng Thái</th>
                <th>Nội Dung</th>
                <th>Setting</th>
            </thead>
            @foreach ($list as $item)
                <tbody>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titleproduct }}</td>
                    <td><img src="/uploads/{{ $item->imgproduct }}" alt="" srcset="" width="100px"
                            height="150px"></td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->ProductMenu->namemenu }}</td>
                    <td>{{ $item->ProductAnimation->name }}</td>
                    <td>{{ $item->ProductDelay->name }}</td>
                    <td>
                        <input type="checkbox" class="toggle-product" data-id="{{ $item->id }}" data-toggle="toggle"
                            data-style="slow" data-on="Enabled"
                            data-off="Disabled"{{ $item->status == true ? 'checked' : '' }}>
                    </td>
                    <td>
                        <textarea name="" id="" cols="35" rows="4" disabled>{!! $item->noidung !!}</textarea>
                    </td>
                    <td>
                        <div class="controll-item">
                            <form action="{{ route('delete_product', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="control-delete"><i class="fa-solid fa-trash-can"></i></button>&nbsp;&nbsp;
                            </form>
                            <form action="{{ route('edit_product', $item->id) }}">

                                <button class="control-setting"><i class="fa-solid fa-gear"></i></button>
                            </form>
                        </div>
                    </td>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
