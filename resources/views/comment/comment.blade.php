@extends('template.template')


@section('pageTitle')

心情留言板

@endsection


@section('css')
<link rel="stylesheet" href="{{asset('css/comment.css')}}">

@endsection

@section('main')
        <div class="banner .container-fluid">
            <div class="list-detail">
                <div id="section1" class="container-xxl">
                    <!-- 留言板標題 -->
                    <div class="shop-car">
                        <h3>心情留言板</h3>
                    </div>
                </div>
                <!-- 中間留言文章 -->
                <div id="section2">

                    @foreach ($comments as $comment)

                    <div class="content">
                        <div class="article-box">
                            <div class="article-top">
                                <div class="article-top-left">
                                    <div class="article-title-box">
                                        <div class="article-title">
                                            <h6>標題：</h6>
                                        </div>
                                        <div class="title-box">
                                            <p>{{$comment->title}}</p>
                                        </div>
                                    </div>
                                    <div class="article-author-box">
                                        <div class="article-author">作者:</div>
                                        <div class="name-box">{{$comment->name}}</div>
                                    </div>
                                </div>
                                <div class="article-top-right">
                                    <div class="article-time-box">
                                        <div class="article-time">發文時間：</div>
                                        <div class="time-box">{{Substr($comment->created_at,0,10)}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="article-bot">
                                <div class="article-content">
                                    {{$comment->content}}
                                </div>
                            </div>
                        </div>
                        <div class="function-box">
                            @auth

                            <a href="/comment/edit/{{$comment->id}}">編輯留言</a>
                            <a href="/comment/delete/{{$comment->id}}">刪除留言</a>

                            @endauth

                        </div>
                    </div>

                    @endforeach

                </div>
                <!-- 底部留言表單 -->
                <div id="section3">
                    <form action="/comment/save" class="form" method="get" >
                        <div class="content">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-title">
                                        <p>文章標題：</p>
                                        <input type="text" name="title">
                                    </div>
                                    <div class="form-name">
                                        <p>文章作者：</p>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                                <div class="form-bot">
                                    <div class="form-content">
                                        <p>文章內容：</p>
                                        <textarea name="content" id="" cols="35" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-box">
                            <button type="submit">提交留言</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection
