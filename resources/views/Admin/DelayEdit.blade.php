@extends('Layout/AdminLayout')
@section('content')
    <div class="row px-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomeAdmin') }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ListDelay') }}"> List
                        Delay</a></li>
                </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Delay </li>
            </ol>
        </nav>

    </div>
    <div class="row ml mt-3">
        <div>
            <h4 class=" mb-0  ml-3 blod">Edit Delay</h4>
        </div>
    </div>
    <div class="container mt-5 input-add">
        <form action="{{ route('update_delay', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" placeholder="Enter-Name" class="mt-5" id="slug"
                onkeyup="ChangeToSlug()" value="{{ $item->name }}">
            <br>
            @error('name')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <input type="text" name="slug" placeholder="Enter-Slug" class="mt-5" id="convert_slug"
                value="{{ $item->slug }}">
            <br>
            @error('slug')
                <p class="validation-thongbao">{{ $message }}</p>
            @enderror
            <label for="">Status</label>
            @if ($item->status == '1')
                <select name="status" id="">
                    <option value="1">ON</option>
                    <option value="0" selected>OFF</option>
                </select>
            @else
                <select name="status" id="">
                    <option value="0" selected>OFF</option>
                    <option value="1">ON</option>
                </select>
            @endif
            <button value="submit" class="mt-5">Submit</button>
        </form>
    </div>
    <script src="{{ asset('js/slug.min.js') }}"></script>
@endsection
