@extends('layouts.main')

@section('content')
<?php

use Illuminate\Support\Facades\Auth;

 foreach ($posts as $post) {
    # code...
 ?>
<div class="post-preview">
                        <a href="posts/{{$post->id}}"><h2 class="post-title">{{$post->title}}</h2></a>
                        <a href="posts/{{$post->id}}"><h3 class="subtitle">{{$post->text}}</h3></a>

                        <p class="post-meta">
                            <a href="posts/{{$post->id}}">ادامه مطالب</a>
                            <?php if(Auth::check() && Auth::user()->role=='admin'){?>
                            <a href="posts/{{$post->id}}/edit">ویرایش مطلب</a>
                            <form action="{{url('/posts',['id'=>$post->id])}}" method="post">
                                <input class="btn" type="submit" value="Delete">
                                @method('delete')
                                @csrf
                            </form>
                        </p>
                        <?php } ?>
                    </div>
                    <?php } ?>
@endsection
