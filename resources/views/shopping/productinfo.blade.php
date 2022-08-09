@extends('template.template')


@section('pageTitle')
商品頁面
@endsection


@section('css')
<link rel="stylesheet" href="{{asset('css/productinfo.css')}}">

<!-- Swiper -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<style>
    .swiper {
        width: 100%;
        height: 100%;

    }

    .swiper-wrapper {
        align-items: center;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        /* background: #fff; */

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        outline: 1px solid;
    }


    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .mySwiper2 {
        height: 80%;
        width: 100%;

    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;

    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.6;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
        border: 5px solid #003153;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
        background-color: #d1d5db;
    }

    /* 下一張圖片 按鍵範圍 */
    .swiper-button-next:after {
        padding: 30px 15px 30px 15px;
    }

    /* 上一張圖片 按鍵範圍 */
    .swiper-button-prev:after {
        padding: 30px 15px 30px 15px;
    }
</style>


<!-- Swiper 點擊放大圖功能 css -->
<style>
    .imgbox2 {
        display: none;
        top: 0;
        left: 0;
        width: 100%;
        /*容器佔滿整個螢幕*/
        height: 100%;
        position: fixed;
        background: rgba(0, 0, 0, 0.5);
        /* display: flex; */
        align-items: center;
        justify-content: center;
        flex-direction: column;
        z-index: 100;
    }

    .imgbox2 img {
        width: 30vw;
        /* height: 50vh; */
        border: 20px solid white;
    }

    .imgbox2 .closeall {
        margin-left: 30%;
    }
</style>

@endsection

@section('main')

<div class="banner .container-fluid">
    <!-- 商品資訊 -->
    <div id="product-detail">
        <!-- 商品明細 -->
        <div class="page-title">
            <h4>商品頁面</h4>
        </div>
        <!-- 商品內容 -->
        <div class="product-info">
            <!-- 左邊箱子放照片 -->
            <div class="left-box">
                <div class="main-product-photo">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2">
                        <div class="swiper-wrapper">



                            @foreach ($product2 as $gogo)
                            <div class="swiper-slide">
                                <div class="imgbox">
                                    <img src="{{$gogo->img}}" />
                                </div>
                            </div>

                            @endforeach

                            @foreach ($product->imgs as $item)

                            <div class="swiper-slide">
                                <div class="imgbox">
                                    <img src="{{$item->img_path}}" />
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>
                    {{-- 放大圖片用的迴圈 --}}

                    @foreach ($product2 as $gogo)
                    <div class="imgbox2">
                        <button class="closeall">X</button>
                        <img src="{{$gogo->img}}" />
                    </div>
                    @endforeach

                    @foreach ($product->imgs as $item)
                    <div class="imgbox2">
                        <button class="closeall">X</button>
                        <img src="{{$item->img_path}}" />
                    </div>
                    @endforeach
                </div>
                <div class="other-product-photo">
                    <div class="swiper second-swiper1">
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">

                            @foreach ($product2 as $gogo)
                            <div class="swiper-slide">
                                <img src="{{$gogo->img}}" />
                            </div>
                            @endforeach

                            @foreach ($product->imgs as $item)

                            <div class="swiper-slide">
                                <img src="{{$item->img_path}}" />
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="swiper second-swiper2">
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            <!-- 右邊箱子放資訊 -->
            <div class="right-box">
                <!-- 商品標題 -->
                <div class="product-title">
                    {{-- {{$product2}} --}}
                    @foreach ($product2 as $gogo)

                    <h4>{{$gogo->name}}</h4>
                </div>
                <!-- 商品資訊(含 商品類別、商品描述、商品價格、加入購物車、購買) -->
                <div class="product-content">
                    <div class="product-type">
                        <p>商品類別</p>
                    </div>
                    {{-- 還沒增加 --}}
                    {{-- <div class="product-seller">賣家名稱：</div>
                    <div class="seller-name">{{Auth::user()->name}}</div></br> --}}


                    <div class="product-quantity">剩餘數量：</div>
                    <div class="quantity-box">{{$gogo->quantity}}</div>
                    <div class="product-description">
                        <p>商品描述：</p>
                    </div>
                    <div class="description-box">{{$gogo->description}}</div>
                    <div class="product-price"><span>$　</span><span>{{$gogo->price}}</span></div>
                    <div class="wants-qty">想購買數量：</div>
                    <div class="qty-choice">
                        <i class="fa-solid fa-minus" id="minus"></i>
                        <input type="text" value="1" id="add_qty">
                        <i class="fa-solid fa-plus" id="plus"></i>
                    </div>
                    <div class="product-button">
                        <div class="add-shoppingCart" id="add_product" ><button >加入購物車</button></div>
                        <div class="buy"><button>直接結帳</button></div>
                    </div>
                </div>

                @endforeach

            </div>

        </div>

    </div>
    @endsection

    @section('Js')


    <!-- Swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: false,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

    <!-- 放大圖片js -->

    <script>

        // 改為單個彈跳視窗直接將圖片輸出到彈跳視窗內
        // 不用forEach迴圈跑

        const imgs = document.querySelectorAll('.main-product-photo .imgbox')
        const imgs2 = document.querySelectorAll('.main-product-photo .imgbox2')
        var z = document.querySelectorAll('.closeall');

        imgs.forEach((img) => {
            img.addEventListener('click', () => {
                // console.log('fireeeee');
                //迅速將t的 nodelist推到陣列imgs裡面
                let t = Array(...imgs);
                // console.log(t.indexOf(img) + '1111');
                imgs2.forEach((img2) => {
                    let t2 = Array(...imgs2)
                    if ((t.indexOf(img) - 1) == t2.indexOf(img2)) {

                        img2.style.display = "flex";

                        z.forEach((insideZ) => {
                            insideZ.addEventListener('click', () => {
                                img2.style.display = 'none'
                            })
                        })

                    }
                })
            })
        })



    </script>


    <!-- 傳送資料到購物車 js -->

    <script>
        const minus = document.querySelector('#minus');
        const qty = document.querySelector('#add_qty');
        const plus = document.querySelector('#plus');
        const add_product = document.querySelector('#add_product');
        // console.log(add_product + '888');
        const product_id = {!! $product-> id!!};

        // console.log(add_product,product_id + '999');


        // console.log(minus, qty, plus);

        minus.onclick = function () {
            qty.value = parseInt(qty.value) - 1
        }

        plus.onclick = function () {
            qty.value = parseInt(qty.value) + 1
        }

        add_product.onclick = function () {
            var formData = new FormData();
            formData.append('add_qty',parseInt(qty.value));
            formData.append('product_id',{!! $product-> id!!});
            formData.append('_token','{!! csrf_token() !!}');

            fetch('/add_to_cart',{
                method: 'POST',
                body: formData
            })

            .then(response => response.json())
            .catch(error => {
                alert('新增失敗,購氣幾拜')
                return 'error';
            })
            .then(response =>{
                if(response != 'error'){

                    if(response.result == 'success')
                    alert('恭喜喔!成功!')
                    else{
                        alert('失敗了'+ response.message);
                    }

                }
            });

        }


    </script>

    @endsection
