@extends('layouts.app')


@section('pageTitle')
    商品管理頁面
@endsection


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('main')
    <div class="banner .container-fluid">
        <div class="list-detail">
            <div id="section1" class="container-xxl">
                <!-- 留言板標題 -->
                <div class="shop-car d-flex justify-content-between mb-2">
                    <h3>商品管理頁面</h3>
                    <a href="/product/create" class="btn btn-success">新增商品</a>
                </div>
            </div>
            <!-- 中間留言文章 -->


            <div id="section2">
                <table id="product_list" class="display">
                    <thead>
                        <tr>
                            <th>圖片</th>
                            <th>品名</th>
                            <th>介紹</th>
                            <th>價格</th>
                            <th>數量</th>
                            <th>功能</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <!--商品圖片-->
                                    <a href="/product/productinfo/{{ $product->id }}"class="d-flex justify-content-center">
                                        <img src="{{ asset($product->img) }}" alt=""
                                            style="max-width:270px; max-height:130px;">
                                    </a>
                                </td>
                                <td>
                                    <!--商品名稱-->
                                    <p>{{ $product->name }}</p>
                                </td>
                                <td>
                                    <!--商品介紹-->
                                    <p>{{ $product->description }}</p>
                                </td>
                                <td>
                                    <!--商品價格-->
                                    <p>{{ $product->price }}</p>
                                </td>
                                <td>
                                    <!--商品數量-->
                                    <p>{{ $product->quantity }}</p>
                                </td>

                                <td>
                                    <!--功能按鈕-->
                                    <button class="btn btn-success"
                                        onclick="location.href='/product/edit/{{ $product->id }}'">編輯</button>

                                    <button class="btn btn-danger"
                                        onclick="document.querySelector('#deleteForm{{ $product->id }}').submit();">刪除</button>

                                    <form action="/product/delete/{{ $product->id }}" method="post" hidden
                                        id="deleteForm{{ $product->id }}">
                                        @csrf
                                        {{-- @method('post') --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('Js')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#product_list').DataTable();
        });
    </script>
@endsection
