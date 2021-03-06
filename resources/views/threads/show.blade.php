@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">{{ $thread->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                {{ $thread->body }}
                </div>


            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@foreach ($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>    
</div>
@endsection
