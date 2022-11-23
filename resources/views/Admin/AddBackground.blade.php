@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('background') }}"> List Background
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page"> ADD Background </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">ADD Background</h4>
        </div>
    </div>
    <form action="{{route('submit_bg')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row ml-2 mt-3 add-bg">
        <div>
            @error('hinhanh')
            <p class="validation-thongbao">{{ $message }}</p>
        @enderror
            <input type="file" name="hinhanh" id="imageFile" onchange="chooseFile(this)" class="add-background">
            
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <div class="row ml-2 mt-3">
        @error('status')
        <p class="validation-thongbao">{{ $message }}</p>
    @enderror
        <select name="status" id="">
            <option value="0">OFF</option>
            <option value="1">ON</option>
        </select>

    </div>
    <div class="row ml-2 mt-3">
        <div class="mb-3">
            <img type src="" alt="" style="width:1720px; height:808px" id="image"
                style="background-size:cover;">
        </div>
    </div>
</form>
    <script src="{{ asset('js/img_show.min.js') }}"></script>
@endsection
