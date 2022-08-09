@extends('layouts.app')



@section('pageTitle')
    編輯BANNER
@endsection


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <style>
        form img {
            width: 400px;
        }
    </style>
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>BANNER修改</h3>
                </div>
            </div>
            <!-- 中間留言文章 -->
            <div id="section2">


            </div>
            <!-- 底部留言表單 -->
            <div id="section3">
                <form action="/banner/update/{{ $banner->id }}" class="form" method="post"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="upload-box d-flex flex-column">

                        <!-- 預覽圖片 -->
                        <div>現在圖片</div>
                        <img src="{{ $banner->img_path }}" alt="">

                        <label for="img_path">圖片</label>
                        <input type="file" name="img_path" id="img_path">

                        <label for="img_opacity">透明度</label>
                        <input type="number" name="img_opacity" id="img_opacity" value="{{ $banner->img_opacity }}">

                        <label for="weight">權重</label>
                        <input type="number" name="weight" id="weight" value="{{ $banner->weight }}">
                    </div>



                    <!-- 按鈕 -->
                    <div class="button-box d-flex justify-content-center">
                        <button class="btn btn-secondary me-3" type="submit">取消</button>
                        <button type="submit" class="btn btn-primary">修改BANNER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
