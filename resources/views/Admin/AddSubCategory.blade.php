@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('SubCategory') }}"> List Sub
                        Category </a></li>
                <li class="breadcrumb-item active" aria-current="page"> ADD Sub Category </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">ADD Sub Category</h4>
        </div>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{route('add_sub')}}" method="post">
            @csrf
            <input type="text" name="subcategory" placeholder="Sub Category" class="mt-5" id="slug"
                onkeyup="ChangeToSlug()">
            <br>
            @error('subcategory')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="slugsub" placeholder="Enter-Slug" class="mt-5" id="convert_slug">
            <br>
            @error('slugsub')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
           <label for="" class="mt-5">Thuộc danh mục cha :</label>
            <select name="parent_id" id="" >
                @foreach ($parent as $item)
                <option value="{{$item->id}}">{{$item->nameparent}}</option>
                @endforeach
            </select>
     <label for="" class="mt-5">Status:</label>
            <select name="status" >
                <option value="0">On</option>
                <option value="1">Off</option>
            </select>
            <button value="submit" class="mt-5">Submit</button>
        </form>
    </div>
    <script src="{{ asset('js/slug.min.js') }}"></script>
@endsection
