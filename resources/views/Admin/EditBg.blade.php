@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('background') }}"> List Background
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Background </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">Edit Background</h4>
        </div>
    </div>
    <form action="{{ route('update_bg',$item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row ml-2 mt-3 add-bg">
            <div>
                @error('hinhanh')
                    <p class="validation-thongbao">{{ $message }}</p>
                @enderror
                <input type="file" name="hinhanh" id="imageFile" onchange="chooseFile(this)" class="add-background"
                    src="/uploads/{{ $item->hinhanh }}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="row ml-2 mt-3">
            @error('status')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            @if ($item->status == '0')
                <select name="status" id="">
                    <option value="">Status</option>
                    <option selected value="0">OFF</option>
                    <option value="1">ON</option>
                </select>
            @else
                <select name="status" id="">
                    <option value="">Status</option>
                    <option value="0">OFF</option>
                    <option selected value="1">ON</option>
                </select>
            @endif
        </div>
        <div class="row ml-2 mt-3">
            <div class="mb-3">
                <img type src="/uploads/{{ $item->hinhanh }}" alt="" style="width:1720px; height:808px"
                    id="image" style="background-size:cover;">
            </div>
        </div>
    </form>
    <script src="{{ asset('js/img_show.min.js') }}"></script>
@endsection
