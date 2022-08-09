@extends('layouts.app')

@section('pageTitle')

編輯使用者

@endsection


@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/comment.css')}}">
<style>

    form img{
        width: 400px;
    }

    form label{
        margin-top:10px;
    }
</style>
@endsection

@section('main')
        <div class="banner .container-fluid">
            <div class="list-detail">
                <div id="section1" class="container-xxl">
                    <!-- 標題 -->
                    <div class="shop-car">
                        <h3>編輯使用者</h3>
                    </div>
                </div>

                <!-- 底部留言表單 -->
                <div id="section3">
<form action="/account/update/{{$users->id}}" class="form" method="post" enctype="multipart/form-data" >

@csrf

<div class="accountformbox d-flex flex-column mb-3">

<label for="name">使用者名稱</label>
<input type="text" name="name" id="name" value="{{$users->name}}">

<label for="email">電子郵件</label>
<input type="text" name="email" id="email" value="{{$users->email}}">

<label for="password">使用者密碼</label>
<input type="password" name="password" id="password" value="{{$users->password}}">

<label for="power">使用者權限</label>
<select name="power" id="power">
    <option value="1" @if ($users->power == 0 ) selected @endif>超級無敵管理者</option>
    <option value="2" @if ($users->power == 1 ) selected @endif>火雞</option>
</select>

</div>
</div>



            <!-- 按鈕 -->
                        <div class="button-box d-flex justify-content-center">
                            <button class="btn btn-secondary me-3" type="submit"  onclick="history.back()" >取消</button>
                            <button type="submit" class="btn btn-primary">更新使用者資料</button>
                        </div>
                    </form>





                </div>
            </div>
        </div>

        @endsection


