@extends('layouts.main')

@section('content')
<form action="{{url('posts')}}" method="post">
    @csrf()
    <input class="form-control" name="title">
    <textarea class="form-control" name="text"></textarea>
    <button class="btn btn-primary">ذخیره</button> 
</form>

@endsection
 