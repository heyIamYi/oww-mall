@extends('layouts.app')


@section('pageTitle')

訂單管理頁面

@endsection


@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('css/comment.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection

@section('main')
        <div class="banner .container-fluid">
            <div class="list-detail">
                <div id="section1" class="container-xxl">
                    <!-- 留言板標題 -->
                    <div class="shop-car d-flex justify-content-between mb-2">
                        <h3>訂單管理頁面</h3>
                    </div>
                </div>
                <!-- 中間留言文章 -->

                <div id="section2">
                    <table id="order-list" class="display">
                        <thead>
                            <tr>
                                <th>訂單編號</th>
                                <th>訂購人姓名</th>
                                <th>聯絡信箱</th>
                                <th>總金額</th>
                                <th>訂單狀態</th>
                                <th>查看訂單</th>
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
                                    @if($order->status === 1)
                                    訂單成立未付款
                                    @elseif ($order->status === 2)
                                    已付款
                                     @elseif ($order->status === 3)
                                    已出貨
                                    @elseif ($order->status === 4)
                                    已結單
                                    @else
                                    已取消
                                    @endif
                                </td>
                                <td>
                                    {{-- 查看訂單 --}}
                                    <button class="btn btn-success" onclick="location.href='/ordermanage/edit/{{$order->id}}'">編輯</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#order-list').DataTable();
} );
</script>

@endsection
