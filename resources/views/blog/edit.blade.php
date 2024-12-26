@extends('master')

@section('title', 'Edit post')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <h1>Edit post</h1>

    <form action="{{ route('blog.update', $post->id) }}" method="post">

        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control mt-1" value="{{ $post->title }}">
        </div>

        <div class="form-group mt-3">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control mt-1" rows="10">{{ $post->body }}</textarea>
        </div>

        {{-- categories --}}
        <div class="form-group mt-3">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control mt-1">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option @if ($post->category_id == $category->id) selected @endif value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- tags --}}
        <div class="form-group mt-3">
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" class="form-control mt-1" multiple>
                @foreach ($tags as $tag)
                    <option @if(in_array($tag->id, $tag_ids)) selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update post</button>

    </form>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('#tags').select2();
    });
</script>
@endsection
