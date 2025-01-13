@extends('header.header')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h2 >Bình luận</h2>
    @if(session('success'))
        <div class="alert alert-success" style="color: green">{{ session('success') }}</div>
    @endif

    <form   action="{{ route('post.store', $post) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="comment" class="form-label">Nội dung bình luận</label>
            <input type="text" class="form-control" id="comment" name="comment" required>
        </div>
        <button type="submit" class="btn" style="background: blue">Bình luận</button>
    </form>

    <h3>Danh sách bình luận</h3>
    <ul style="list-style-type: none;">
        @foreach($post->comments as $comment)
            <li style = " color: #333;">{{ $comment->comment }}</li>
        @endforeach
    </ul>

    <a href="{{ route('comments.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
