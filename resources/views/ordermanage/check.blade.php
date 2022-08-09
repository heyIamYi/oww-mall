@extends('layouts.app')

@section('pageTitle')

編輯使用者

@endsection


@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

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
<form action="/ordermanage/update/{{$id}}" class="form" method="post" >

@csrf
<table id="order-list" class="display">
    <thead>
        <tr>
            <th>訂單編號</th>
            <th>訂購人姓名</th>
            <th>聯絡信箱</th>
            <th>總金額</th>
            <th>訂單狀態</th>
            {{-- <th>查看訂單</th> --}}
        </tr>
    </thead>
    <tbody>

        @foreach ($order as $order)


        <tr>
            <td>
                {{-- 訂單編號 --}}
                {{$order->id}}
            </td>
            <td>
                {{-- 訂購人姓名 --}}
                {{$order->name}}
            </td>
            <td>
                {{-- 聯絡信箱 --}}
                {{$order->email}}

            </td>
            <td>
                {{-- 總金額 --}}
                {{$order->total}}

            </td>
            <td>
                {{-- 訂單狀態 --}}
                <select name="status" id="">
                    <option  value="1" selected>
                訂單成立未付款
                    </option>
                <option  value="2">
                已付款
            </option>
                <option  value="3">
                已出貨
            </option>
                <option  value="4">
                已結單
            </option>
                <option  value="5">
                已取消
            </option>
            </select>
            </td>
        </tr>

        @endforeach

        </tbody>
    </table>
            <!-- 按鈕 -->
                        <div class="button-box d-flex justify-content-center">
                            <button class="btn btn-secondary me-3" type="submit"  onclick="history.back()" >取消</button>
                            <button style="width:200px;" type="submit" class="btn btn-primary">更新訂單資料</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection


        @section('Js')

        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready( function () {
            $('#order-list').DataTable();
        } );
        </script>

        @endsection
