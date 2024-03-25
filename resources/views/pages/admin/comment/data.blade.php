@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-8">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- datatable --}}
        <div class="card mb-4">
            <div class="card-body table-responsive">
                <a href="{{ route('comments.create') }}" type="button" class="btn btn-primary mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Komentar
                </a>
                <div class="row">
                    @foreach($comments as $comment)
                    <div class="card mb-4">
                        <div class="card-body table-responsive">
                            <div class="post">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span><strong>{{ $comment->user->name }}</strong> <i>@</i>{{ $comment->user->username }} <strong>&#183;</strong> <span id="time_{{ $comment->id }}"></span></span>
                                    @if(auth()->user()->id == $comment->user_id)
                                    <div class="d-flex">
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="badge text-dark">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="badge border-0 btnDelete text-dark" data-object="Komentar Ini">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                    <script>
                        setInterval(function() {
                            var timeElement = document.getElementById('time_{{ $comment->id }}');
                            var currentTime = new Date().getTime();
                            var commentTime = new Date('{{ $comment->created_at }}').getTime();
                            var timeDifference = currentTime - commentTime;
                            var timeElapsed = Math.floor(timeDifference / 1000);
                            var timeDisplay;
                            if (timeElapsed < 60) {
                                timeDisplay = timeElapsed + ' detik yang lalu';
                            } else if (timeElapsed < 3600) {
                                timeDisplay = Math.floor(timeElapsed / 60) + ' menit yang lalu';
                            } else if (timeElapsed < 86400) {
                                timeDisplay = Math.floor(timeElapsed / 3600) + ' jam yang lalu';
                            } else {
                                timeDisplay = Math.floor(timeElapsed / 86400) + ' days ago';
                            }
                            timeElement.innerText = timeDisplay;
                        }, 1000);
                    </script>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
