@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ListProduct') }}">List Product</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Product </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">Edit Product</h4>
        </div>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{ route('update_product', $items->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="titleproduct" placeholder="Enter Name Product" id="slug"
                onkeyup="ChangeToSlug()" value="{{ $items->titleproduct }}">
            <br>
            @error('titleproduct')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <br>
            <input type="text" name="slugproduct" placeholder="Enter Slug" id="convert_slug"
                value="{{ $items->slugproduct }}">
            <br>
            @error('slugproduct')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <br>
            <br>
            <input type="text" name="link" value="{{ $items->link }}" placeholder="Enter Link">
            @error('link')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <br><br>
            <input type="file" name="imgproduct" id="imageFile" onchange="chooseFile(this)">
            @error('imgproduct')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <br><br>
            <img type src="/uploads/{{ $items->imgproduct }}" alt="" style="width:270px; height:300px"
                id="image" style="background-size:cover;">
            <br><br>
            <label for="">Thuộc danh mục</label>

            <select name="category_id" id="">
                @foreach ($category as $item)
                    <option {{ $item->id == $items->category_id ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->namemenu }}</option>
                @endforeach
            </select>
            <label for="">Animation</label>

            <select name="animation_id" id="">
                @foreach ($animation as $item)
                    <option {{ $item->id == $items->animation_id ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>
            <label for="">Delay</label>

            <select name="delay_id" id="">
                @foreach ($delays as $item)
                    <option {{ $item->id == $items->delay_id ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label for="">Trạng Thái</label>
            @if ($items->status == '0')
                <select name="status" id="">
                    <option selected value="0">ON</option>
                    <option value="1">OFF</option>
                </select>
            @else
                <select name="status" id="">
                    <option value="0">ON</option>
                    <option selected value="1">OFF</option>
                </select>
            @endif
            <br>
            <br>
            <label for="">Nội Dung</label>
            <textarea name="noidung" id="noidung" cols="30" rows="10">{{ $items->noidung }}</textarea>
            @error('noidung')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <script src="{{ asset('js/slug.min.js') }}"></script>
        <script src="{{ asset('js/img_show.min.js') }}"></script>
    @endsection
