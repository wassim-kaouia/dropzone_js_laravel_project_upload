@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{ $post->title }}
                <hr>
                @if ($post->images()->count() >0)

                    <div class="row">
                        @foreach ($post->images as $image)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ asset('storage/images' . '/' . $image->path) }}" height="150px" width="150px" class="card-img-top mb-3">
                                    </div>
                                    <div class="card-body">
                                        <form action="/delete" method="POST">
                                           @csrf
                                           @method('delete')
                                             <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
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