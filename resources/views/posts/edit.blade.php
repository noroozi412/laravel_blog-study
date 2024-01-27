@extends('layouts.main')

@section('content')
<form action="{{url('posts',$post->id)}}" method="post">
    @csrf()
    @method('PUT')
    <input class="form-control" name="title" value="{{$post->title}}">
    <textarea class="form-control" name="text">{{$post->text}}</textarea>
    <button class="btn btn-primary">ذخیره</button> 
</form>

@endsection