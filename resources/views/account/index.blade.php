@extends('layouts.app')


@section('pageTitle')

使用者管理頁面

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
                        <h3>使用者管理頁面</h3>
                        <a href="/account/create" class="btn btn-success">新增使用者</a>
                    </div>
                </div>
                <!-- 中間留言文章 -->


                <div id="section2">
                    <table id="account_list" class="display">
                        <thead>
                            <tr>
                                <th>使用者名稱</th>
                                <th>信箱</th>
                                <th>權限</th>
                                <th>功能</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)


                            <tr>
                                <td>
                                    <!--使用者名稱-->
                                    <p>{{$user->name}}</p>
                                </td>
                                <td>
                                    <!--使用者信箱-->
                                    <p>{{$user->email}}</p>
                                </td>
                                <td>
                                    <!--使用者權限  -->
                                    <p>
                                        @if (($user->power) == 0)
                                        超級無敵管理者
                                        @elseif ($user->power == 1)
                                        火雞
                                        @else
                                        未命名的階層
                                        @endif

                                       </p>
                                </td>


                                <td>
                                     <!--功能按鈕-->
                                    <button class="btn btn-success" onclick="location.href='/account/edit/{{$user->id}}'">編輯</button>

                                    <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$user->id}}').submit();">刪除</button>

                                    <form action="/account/delete/{{$user->id}}" method="post" hidden id="deleteForm{{$user->id}}">
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

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#account_list').DataTable();
} );
</script>

@endsection
