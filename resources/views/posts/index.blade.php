@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <section class="form-post">
        <h2 class="content-header">さぁ、最新のニュースをシェアしましょう</h2>
        @include('common.validation_errors')
        <form id="formPost" method="POST" action="{{ route('posts.store') }}" accept-charset="UTF-8">
            @csrf
            <div class="input-title">
                {{ Form::label('title', 'タイトル：') }}
                {{ Form::input('text', 'title') }}
            </div>
            <div class="input-body">
                {{ Form::label('body', '記事：') }}
                {{ Form::textarea('body') }}
            </div>
            <div class="input-submit">
                {{ Form::submit('投稿', ['class' => 'btn-submit']) }}
            </div>
        {{ Form::close() }}
    </section>
    <hr>
    <section class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <h3 class="post-title">{{ $post->title }}</h3>
                <p class="post-body">{{ $post->body }}</p>
                {{ Html::linkRoute('posts.show', '記事全文・コメントを見る', $post->id) }}
            </div>
            <hr>
        @endforeach
        {{ $posts->links() }}
    </section>
@endsection
