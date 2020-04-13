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
            <form action="/file-upload" class="dropzone" id="myDropzoneForm">
            
            </form>
           </div>
        </div>
    </div>
@endsection