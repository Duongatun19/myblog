@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ListHorizontal') }}"> List Animation</a></li>
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page"> ADD Animation </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">ADD Animation</h4>
        </div>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{route('AddAnimation')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter-Name" class="mt-5" id="slug"
                onkeyup="ChangeToSlug()">
            <br>
            @error('name')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="slug" placeholder="Enter-Slug" class="mt-5" id="convert_slug">
            <br>
            @error('slug')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <label for="">Status</label>
            <select name="status" id="">
                <option value="0">OFF</option>
                <option value="1">ON</option>
            </select>
            <button value="submit" class="mt-5">Submit</button>
        </form>
    </div>
    <script src="{{ asset('js/slug.min.js') }}"></script>
@endsection
