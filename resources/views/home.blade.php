@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="feed p-2">
                    <div class="share border bg-white">
                        <div class="d-flex flex-row inputs p-2 pt-4">
                            <img class="rounded-circle" src="/uploads/{{Auth::user()->avatar}}" width="40" height="40">
                            <textarea class="form-control animated border-0 form-control share-input" id="txtarea" placeholder="Update your status"></textarea>
{{--                            <input type="text" class="" placeholder="Share your thoughts">--}}
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
                                <div class="align-items-center border-left p-2 px-5 btn publish" aria-label="Publish">
                                    <span class="ml-1">
                                        <i class="fa fa-send"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white border mt-2">
                        <div>
                            <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle" src="https://i.imgur.com/aoKusnD.jpg" width="45">
                                    <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">Thomson ben</span><span class="text-black-50 time">40 minutes ago</span></div>
                                </div>
                                <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                            </div>
                        </div>
                        <div class="p-2 px-3"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
                        <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>
                    </div>
                    <div class="bg-white border mt-2">
                        <div>
                            <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle" src="https://i.imgur.com/aoKusnD.jpg" width="45">
                                    <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">Thomson ben</span><span class="text-black-50 time">40 minutes ago</span></div>
                                </div>
                                <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                            </div>
                        </div>
                        <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="https://i.imgur.com/aoKusnD.jpg"></div>
                        <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
