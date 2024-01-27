@extends('layouts.main')

@section('content')

    # code...
    <?php if(Auth::check()){

redirect('/login');} ?>
    
<div class="post-preview">
                        <a href=""><h2 class="post-title">{{$post->title}}</h2></a>
                        <a href=""><h3 class="subtitle">{{$post->text}}</h3></a>
                            
                        <p class="post-meta">
                            

                            <?php  foreach($post->comments as $comment){          ?>   
                                <br>
                                <?php $comment->user->name='user' ?>

                                متن کامنت:
                                <br>
                                {{$comment->comment}} <br>  درج شده توسط :{{$comment->user->name}} در تاریخ : {{$comment->created_at}}
                                <hr>

                                <?php }          ?>  
                                               
                        </p>
                        <?php if(Auth::check() && Auth::user()->role=='user'){?>
                        <form action="{{url('/comments')}}" method="POST">
                        @csrf()
                        <input name="post_id" hidden value="{{$post->id}}">
                        <textarea name="text" id="" cols="25" rows="2"></textarea>
                        <button type="submit" class="btn btn-primary">ذخیره</button></form> 
                        <?php } ?>
                    </div>
                  
@endsection