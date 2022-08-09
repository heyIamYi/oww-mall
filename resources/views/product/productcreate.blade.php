@extends('layouts.app')


@section('pageTitle')
    新增商品
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car">
                    <h3>新增商品</h3>
                </div>
            </div>
            <!-- 中間留言文章 -->
            <div id="section2">


            </div>
            <!-- 底部留言表單 -->
            <div id="section3">
                <form action="/product/store" class="form" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="upload-box d-flex flex-column">
                        <label for="product_img">商品圖片</label>
                        <input type="file" name="product_img">

                        <div class="upload-box d-flex flex-column">
                            <label for="second_img">次要圖片</label>
                            <input type="file" name="second_img[]" multiple accept="image/*">

                            <label for="name">商品名稱</label>
                            <input type="text" name="name">

                            <label for="description">介紹</label>
                            <input type="text" name="description">


                            <label for="price">價格</label>
                            <input type="number" name="price">


                            <label for="quantity">數量</label>
                            <input type="number" name="quantity">

                        </div>



                        <!-- 按鈕 -->
                        <div class="button-box d-flex justify-content-center">
                            <button class="btn btn-secondary me-3" type="submit">清除</button>
                            <button type="submit" class="btn btn-primary">新增商品</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
