@extends('layouts.app')


@section('pageTitle')

新增使用者

@endsection


@section('css')
    <link rel="stylesheet" href="{{asset('css/comment.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@endsection

@section('main')
        <div class="banner .container-fluid">
            <div class="list-detail">
                <div id="section1" class="container-xxl">
                    <!-- 頁面標題 -->
                    <div class="shop-car">
                        <h3>新增使用者</h3>
                        {{session('problem')}}
                    </div>
                </div>
                <!-- 中間頁面內容 -->
                <div id="section2">
                </div>

                <div id="section3">
                    <form action="/account/store" class="form" method="post" enctype="multipart/form-data" >

@csrf

<div class="upload-box d-flex flex-column" >


<label for="name">使用者名稱</label>
<input type="text" name="name">

<label for="email">電子郵件</label>
<input type="text" name="email">
<div style="color:red;">{{session('email-repeat')}}</div>


<label for="password">密碼</label>
<input type="password" name="password">
<div style="color:red;">{{session('password-error')}}</div>

<label for="password_confirmed">確認密碼</label>
<input type="password" name="password_confirmed">

</div>



            <!-- 按鈕 -->
                        <div class="button-box d-flex justify-content-center">
                            <button style="width:200px;" class="btn btn-secondary me-3" type="reset">清除</button>
                            <button style="width:200px;" type="submit" class="btn btn-primary">新增使用者</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection
