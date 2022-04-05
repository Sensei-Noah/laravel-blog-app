@extends('main')
@section('content')
<div class="container">
    <h1 class="mt-4">{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <div>
        <img style="max-width:100%" src="/storage/{{ $post->image }}"></img>
    </div>
    <div>
        <h3>Straipsio valdymas</h3>
        <ul>
            <li>
                <a href="/post/update/{{ $post->id }}" class="btn btn-primary">Redagavimas</a>
            </li>
            <li>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConformation">Salinimas</button>
            </li>
        </ul>
    </div>
</div>

<div class="modal fade" id="deleteConformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="/post/delete/{{ $post->id }}" class="btn btn-danger">Confirm delete</a>
        </div>
      </div>
    </div>
  </div>

@endsection