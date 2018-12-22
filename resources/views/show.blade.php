@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->post_title }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>
                            {{ $post->post_body }}
                        </p>
                        <hr>
                        <div>
                            <h4>Comments</h4>
                            @forelse ($comments as $comment)
                                <p><strong>{{ $comment->user_name }}</strong> wrote <strong>{{ $comment->comment_body }}</strong></p>
                                @empty
                                <p>There are no comments. Be first!</p>
                            @endforelse

                        </div>
                        @auth
                        <hr>
                        <div>
                            <h4>Write a comment</h4>
                            <form method="POST" action="{{ url('posts/'.$post->id) }}">
                                @csrf
        
                                <div class="form-group row">
        
                                    <div class="col-md-6">
                                        <textarea id="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" required>{{ old('body') }}</textarea>
                                        
                                        @if ($errors->has('body'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('body') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Post
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
