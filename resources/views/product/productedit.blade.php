@extends('layouts.app')

@section('pageTitle')
    編輯商品
@endsection


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <style>
        form img {
            width: 400px;
        }

        form label {
            margin-top: 10px;
        }
    </style>
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 標題 -->
                <div class="shop-car">
                    <h3>編輯商品</h3>
                </div>
            </div>

            <!-- 底部留言表單 -->
            <div id="section3">
                <form action="/product/update/{{ $product->id ?? '' }}" class="form" method="post"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="upload-box d-flex flex-column">

                        <!-- 預覽圖片 -->
                        <div>目前主要圖片</div>
                        <img src="{{ $product->img }}" alt="" style="max-width:300px;">
                        <label for="img">商品主要圖片上傳</label>
                        <input type="file" name="img" id="img">

                        <div>目前其他圖片</div>
                        <div class="d-flex flex-wrap align-items-start">


                            <div class="d-flex flex-column ">

                                @foreach ($product->imgs as $item)
                                    <div class="d-flex mb-3 align-items-center" id="sup_img{{ $item->id }}">
                                        <img src="{{ $item->img_path }}" alt="" style="max-width:150px;"
                                            class="me-3">

                                        <button class="btn btn-danger" onclick="delete_img({{ $item->id }})"
                                            type="button">刪除</button>

                                    </div>
                                @endforeach

                            </div>


                        </div>


                        <label for="second_img">商品其他圖片上傳</label>
                        <input type="file" name="second_img[]" multiple accept="image/*" id="second_img">




                        <label for="name">檔案名稱</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}">

                        <label for="description">介紹</label>
                        <input type="text" name="description" id="description" value="{{ $product->description }}">

                        <label for="price">價格</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}">

                        <label for="quantity">數量</label>
                        <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}">


                    </div>



                    <!-- 按鈕 -->
                    <div class="button-box d-flex justify-content-center">
                        <button class="btn btn-secondary me-3" type="submit" onclick="history.back()">取消</button>
                        <button type="submit" class="btn btn-primary">修改商品</button>
                    </div>
                </form>



                {{-- @foreach ($product->imgs as $item)


                    <form action="/product/delete_img/{{$item->id}}" method="post" hidden id="deleteForm{{$item->id}}">
                        @csrf
                        @method('DELETE')
                    </form>


                    @endforeach --}}




            </div>
        </div>
    </div>
@endsection



@section('Js')
    <script>
        function delete_img(id) {

            let formData = new FormData();
            formData.append('_method', 'delete');
            formData.append('_token', '{{ csrf_token() }}');


            fetch('/product/delete_img/' + id, {
                    method: 'POST',
                    body: formData
                })


                .then(function(response) {

                    let element = document.querySelector('#sup_img' + id)
                    element.parentNode.removeChild(element);

                })

        }
    </script>
@endsection
