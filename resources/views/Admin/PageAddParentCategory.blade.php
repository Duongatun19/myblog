@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ParentCategory') }}"> List Parent
                        Category </a></li>
                <li class="breadcrumb-item active" aria-current="page"> ADD Parent Category </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">ADD Parent Category</h4>
        </div>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{ route('Addparent') }}" method="post">
            @csrf
            <input type="text" name="parentCategory" placeholder="Parent Category" class="mt-5" id="slug"
                onkeyup="ChangeToSlug()">
                <br>
            @error('parentCategory')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="slugparent" placeholder="Enter-Slug" class="mt-5" id="convert_slug">
            <br>
            @error('slugparent')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <select name="status" class="mt-5">
                <option value="0">On</option>
                <option value="1">Off</option>
            </select>
            <button value="submit" class="mt-5">Submit</button>
        </form>
    </div>
    <script src="{{ asset('js/slug.min.js') }}"></script>
@endsection
