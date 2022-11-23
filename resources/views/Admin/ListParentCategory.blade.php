@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Parent Category</li>
            </ol>
        </nav>

    </div>
    <div class="row header-admin">
        <div>
            <h1 class="h3 mb-0 text-gray-800 ml-3">List Parent Category</h1>
        </div>
        <div>
            <a href="{{ route('PageAddParentCategory') }}"><Button class="btn btn-primary">ADD</Button></a>
        </div>

    </div>
    <div class="row mt-5">
        <table class="table table-sm mx-5" id="dataTables-example">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Setting</th>
                </tr>
            </thead>
            @foreach ($list as $item)
                <tbody>

                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nameparent }}</td>
                    <td>{{ $item->slugparent }}</td>
                    <td>
                        @if ($item->status == '0')
                            <i class="on">ON</i>
                        @else
                            <i class="off">OFF</i>
                        @endif
                    </td>
                    <td>
                        <div class="controll-item">
                            <form action="{{ route('delete_parent', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="control-delete"><i class="fa-solid fa-trash-can"></i></button>&nbsp;&nbsp;
                            </form>
                            <form action="{{ route('edit_parent', $item->id) }}">

                                <button class="control-setting"><i class="fa-solid fa-gear"></i></button>
                            </form>
                        </div>
                    </td>

                </tbody>
            @endforeach
        </table>
        <div class="mt-3 right">
            {{ $list->links() }}
        </div>
    </div>
@endsection
