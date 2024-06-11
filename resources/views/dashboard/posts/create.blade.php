@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Posts</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                    class="form-control @error('title')
                   is-invalid
                @enderror"
                    id="title" name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug"class="form-label">Slug</label>
                <input type="text" class="form-control  @error('slug')
                is-invalid
             @enderror"
                    id="slug" name="slug" required value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <label for="category_id">Category</label>
            <select class="form-select" name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @endif
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview">
                <input class="form-control @error('image')
                    is-invalid
                @enderror"
                    type="file" id="image" name="image" onchange="previewImage(event);">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <label for="body">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" name="body"type="hidden" name="content" required value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
            <button type="submit" class="btn btn-primary mt-3">Create post</button>


        </form>
    </div>
    {{-- <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch("/dashboard/posts/createSlug?title=" + title.value).then(response => response.json).then(
                data =>
                slug.value = data.slug)
        });
    </script> --}}
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        // function previewImage() {
        //     const imgPreview = querySelector('.img-preview');
        //     const image = querySelector('#image');
        //     imgPreview.style.display = 'block';
        //     // const blob = URL.createObjectURL(image.files[0]);
        //     // imgPreview.src = blob;

        //     // const oFReader = new FileReader();
        //     // oFReader = readAsDataURL(image.files[0]);

        //     // oFReader.onload = function(oFREvent) {
        //     //     imgPreview.src = oFREvent.target.result;
        //     // }
        // }
        function previewImage(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
