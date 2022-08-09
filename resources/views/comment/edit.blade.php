@extends('template.template')


@section('pageTitle')

編輯留言

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
                        <h3>留言編輯</h3>
                    </div>
                </div>
                <!-- 中間留言文章 -->
                <div id="section2">


                </div>
                <!-- 底部留言表單 -->
                <div id="section3">
                    <form action="/comment/update/{{$comment->id}}" class="form" method="get" >
                        <div class="content">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-title">
                                        <p>文章標題：</p>
                                        <input type="text" name="title" value="{{$comment->title}}">
                                    </div>
                                    <div class="form-name">
                                        <p>文章作者：</p>
                                        <input type="text" name="name" value="{{$comment->name}}">
                                    </div>
                                </div>
                                <div class="form-bot">
                                    <div class="form-content">
                                        <p>文章內容：</p>
                                        <textarea name="content" id="" cols="35" rows="5"
                                        >{{$comment->content}}</textarea>
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
