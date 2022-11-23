@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ParentCategory') }}">List Parent
                        Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Parent Category</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{ route('update_parent', $item->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="parentCategory" value="{{ $item->nameparent }}" placeholder="Parent Category"
                class="mt-5" id="slug" onkeyup="ChangeToSlug()">
                @error('parentCategory')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="slugparent" value="{{ $item->slugparent }}"placeholder="Enter-Slug" class="mt-5"
                id="convert_slug">
                @error('slugparent')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            @if ($item->status == '0')
                <select name="status" class="mt-5">
                    <option selected value="0">On</option>
                    <option value="1">Off</option>
                </select>
            @else
                <select name="status" class="mt-5">
                    <option value="0">On</option>
                    <option selected value="1">Off</option>
                </select>
            @endif

            <button value="submit" class="mt-5">Update</button>
        </form>
    </div>
    <script src="{{ asset('js/slug.min.js') }}"></script>
@endsection
