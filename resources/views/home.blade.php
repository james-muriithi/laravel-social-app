@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="feed p-2">
                    <div class="share border bg-white">
                        <div class="d-flex flex-row inputs p-2 pt-4">
                            <img class="rounded-circle" src="/uploads/{{Auth::user()->avatar}}" width="40" height="40">
                            <form id="post-status" action="{{route('post.store')}}" method="POST" class="w-100">
                                @csrf
                                <textarea class="form-control animated border-0 form-control share-input" name="text" id="txtarea" placeholder="Update your status"></textarea>
                            </form>
                        </div>
                        <div class="d-flex flex-row justify-content-between border-top">
                            <div class="d-flex flex-row publish-options">
                                <div class="align-items-center border-right p-2 share">
                                    <i class="fa fa-camera text-black-50"></i><span class="ml-1 d-md-inline-block d-none">Photo</span>
                                </div>
                                <div class="align-items-center border-right p-2 share ">
                                    <i class="fa fa-video-camera text-black-50"></i><span class="ml-1 d-md-inline-block d-none">Video</span>
                                </div>
                                <div class="align-items-center border-right p-2 share">
                                    <i class="fa fa-file text-black-50"></i><span class="ml-1 d-md-inline-block d-none">Files</span>
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
                                                <span class="font-weight-bold text-capitalize">{{$user->name}}</span>
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
                                <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>
                            </div>
                        @endforeach
                    @endif

{{--                    <div class="bg-white border mt-2">--}}
{{--                        <div>--}}
{{--                            <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">--}}
{{--                                <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle" src="https://i.imgur.com/aoKusnD.jpg" width="45">--}}
{{--                                    <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">Thomson ben</span><span class="text-black-50 time">40 minutes ago</span></div>--}}
{{--                                </div>--}}
{{--                                <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="https://i.imgur.com/aoKusnD.jpg"></div>--}}
{{--                        <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
