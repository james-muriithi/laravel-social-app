@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8 col-sm-12">
                <div class="feed">
                    @if ($errors->any())
                        <div class="row">
                            <div class="alert alert-danger mb-3 mx-auto">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="share border bg-white">
                        <div class="d-flex flex-row inputs p-2 pt-4">
                            <img class="rounded-circle" src="/uploads/{{Auth::user()->avatar}}" width="40" height="40">
                            <form id="post-status" action="{{route('post.store')}}" method="POST" class="w-100" enctype="multipart/form-data">
                                @csrf
                                <textarea data-emojiable="true" class="form-control animated border-0 form-control share-input" name="text" id="txtarea" placeholder="Update your status"></textarea>
                                <input type="file" id="images" accept="image/png, image/jpeg" class="d-none" name="images[]" multiple >
                                <div class="row">
                                    <section class="preview column" id="preview">

                                    </section>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex flex-row justify-content-between border-top">
                            <div class="d-flex flex-row publish-options">
                                <div class="align-items-center border-right p-2 share">
                                    <label for="images">
                                        <i class="fa fa-camera text-black-50"></i><span class="ml-1 d-md-inline-block d-none">Photo</span>
                                    </label>
                                </div>
                                <div class="align-items-center border-right p-2 share ">
                                    <i class="fa fa-video-camera text-black-50"></i><span class="ml-1 d-md-inline-block d-none">Video</span>
                                </div>
                                <div class="align-items-center border-right p-2 share" id="emoji">
                                    <svg class="octicon octicon-smiley" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill="rgba(0,0,0, 0.6)" fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path></svg>                                    <span class="ml-1 d-md-inline-block d-none">Emojis</span>
                                </div>
                            </div>
                            <div class="publish-button">
                                <button form="post-status" class="align-items-center border-left p-2 px-5 btn publish" aria-label="Publish">
                                    <span class="ml-1">
                                        <i class="fa fa-send"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    @if(isset($posts)&& count($posts) > 0 )
                        @foreach($posts as $post)
                            <div class="bg-white border mt-2">
                                @php($user = $post->user)
                                <div>
                                    <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                        <div class="d-flex flex-row align-items-center feed-text px-2">
                                            <img class="rounded-circle" src="/uploads/{{$user->avatar}}" alt="{{$user->name}}" width="45">
                                            <div class="d-flex flex-column flex-wrap ml-2">
                                                <a href="#">
                                                    <span class="font-weight-bold text-capitalize">{{$user->name}}</span>
                                                    <span class="username my-1 pl-2">{{'@'.$user->username}}</span>
                                                </a>
                                                <span class="text-black-50 time">{{$post->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                        <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                                    </div>
                                </div>
                                <div class="p-2 px-3">
                                    <span>
                                        {{$post->text}}
                                    </span>
                                </div>
                                @php($media = $post->media)
                                @if(count($media) > 0)
                                    <div class="feed-image p-2 px-3">
                                    @foreach($media as $m)
                                        <img class="img-fluid img-responsive px-1" src="/media/{{$m->file_name}}">
                                    @endforeach
                                    </div>
                                @endif
                                <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
