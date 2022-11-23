@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Background </li>
            </ol>
        </nav>

    </div>
    <div class="row header-admin">
        <div>
            <h1 class="h3 mb-0 text-gray-800 ml-3">Background</h1>
        </div>
        <div>
            <a href="addbackground"><Button class="btn btn-primary">ADD</Button></a>
        </div>

    </div>
    <div class="row mt-5">
        <table class="table table-sm mx-5" id="dataTables-example">
            <thead>
                <td>Img</td>
                <td>Status</td>

                <td>Setting</td>
            </thead>
            @foreach ($list as $item)
                <tbody>

                    <td><img src="/uploads/{{ $item->hinhanh }}" alt="" srcset="" width="300px"
                            height="150px"></td>
                    <th>
                        <input type="checkbox" class="toggle-banner" data-id="{{ $item->id }}" data-toggle="toggle"
                        data-style="slow" data-on="Enabled"
                        data-off="Disabled"{{ $item->status == true ? 'checked' : '' }}>
                    </th>
                    <th>
                        <div class="controll-item">
                            <form action="{{ route('delete_bg', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="control-delete"><i class="fa-solid fa-trash-can"></i></button>&nbsp;&nbsp;
                            </form>
                            <form action="{{ route('edit_bg', $item->id) }}">

                                <button class="control-setting"><i class="fa-solid fa-gear"></i></button>
                            </form>
                        </div>
                    </th>
                </tbody>
            @endforeach
        </table>

    </div>
@endsection

@push('scripts')

@endpush
