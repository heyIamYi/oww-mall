@extends('layouts.app')


@section('pageTitle')

BANNER頁面

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
                        <h3>Banner管理頁面</h3>
                        <a href="/banner/create" class="btn btn-success">新增BANNER</a>
                    </div>
                </div>
                <!-- 中間留言文章 -->


                <div id="section2">
                    <table id="banner_list" class="display">
                        <thead>
                            <tr>

                                <th>圖片</th>
                                <th>透明度</th>
                                <th>權重</th>
                                <th>功能</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($banners as $banner)


                            <tr>
                                <td>

                                        <img src="{{asset($banner->img_path)}}" alt="" style="opacity:{{$banner->img_opacity}}; max-width:300px;">

                                </td>
                                <td>
                                    <p>{{$banner->img_opacity}}</p>
                                </td>
                                <td>
                                    <p>{{$banner->weight}}</p>
                                </td>

                                <td>
                                    <button class="btn btn-success" onclick="location.href='/banner/edit/{{$banner->id}}'">編輯</button>
                                    <button class="btn btn-danger" onclick="document.querySelector('#deleteForm{{$banner->id}}').submit();">刪除</button>

                                    <form action="/banner/delete/{{$banner->id}}" method="post" hidden id="deleteForm{{$banner->id}}">
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
    $('#banner_list').DataTable();
} );
</script>

@endsection
