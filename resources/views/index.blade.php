@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse($posts as $post)
                        <p><a href="{{ url('posts/'.$post->id) }}">{{ $post->post_title }}</a></p>
                        @empty
                        <p>There are no posts.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
