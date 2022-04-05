@extends('main')
@section('content')
<div class="col-md-10 col-lg-8 col-xl-7">
    @foreach ($posts as $post)
    <!-- Post preview-->
    <div class="post-preview">
        <a href="/post/{{ $post->id }}">
            <h2 class="post-title">{{ $post->title }}</h2>
            <h3 class="post-subtitle">{{ $post->content }}</h3>
            <div>
            <img style="max-width:100%" src="/storage/{{ $post->image }}"></img>
            </div>
        </a>
        <p class="post-meta">
            Posted by
            <a href="#!">Start Bootstrap</a>
            on September 24, 2021
        </p>
    </div>
    <!-- Divider-->
    <hr class="my-4" />
    @endforeach
    <div class="d-flex justify-content-end md-4">
        {{ $posts->links() }}
    </div>
</div>

@endsection