@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My comments</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse($comments as $comment)
                        <p><strong>{{ $comment->comment }}</strong> on post <a href="{{ url('posts/'.$comment->post_id) }}">{{ $comment->post }}</a></p>
                    @empty
                        <p>There are no comments.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
