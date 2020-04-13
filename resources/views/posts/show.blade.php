@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (Session::has('message'))
                <h2 class="alert alert-success">
                    {{ Session::get('message') }}
                </h2>
            @endif
            <div class="col-md-12">
                {{ $post->title }}
                <hr>
                @if ($post->images()->count() >0)

                    <div class="row">
                        @foreach ($post->images as $image)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <img data-lity src="{{ asset('storage/images' . '/' . $image->path) }}" height="150px" width="150px" class="card-img-top mb-3">
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('images.destroy',['id' => $image->id]) }}" method="POST">
                                           @csrf
                                           @method('DELETE')
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


@section('scripts')

    <script>
        Dropzone.options.myDropzoneForm = {
            //these are the methods goven by dropzone
            acceptedFiles : 'image/*',
            //her we call the events 
            init : function(){
                this.on('success',function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0){
                        //if there is no file in the uploading queue or no files is getting uploaded 
                        location.reload();
                    }
                });
            }
        }
    </script>
    
@endsection