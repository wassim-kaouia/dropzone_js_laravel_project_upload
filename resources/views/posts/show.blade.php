@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{ $post->title }}
                <hr>
                @if ($post->images()->count() >0)
                    
                @else
                    <p>No Images Found !</p>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
           <div class="col-md-12">
            <form action="{{ route('posts.upload',['id' => $post->id]) }}" class="dropzone" id="myDropzoneForm">
                @csrf
                
            </form>
           </div>
        </div>
    </div>
@endsection