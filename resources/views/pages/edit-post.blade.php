@extends('main')
@section('content')
    <form action="/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('_partials.errors')
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Pavadinimas" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Turinys">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Prideti nuotrauka</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Saugoti</button>
        </div>

    </form>

@endsection