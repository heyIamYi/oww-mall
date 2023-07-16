<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="this's Zon-Yi's work !">
    <meta name="facebook-domain-verification" content="3juy89z9pk9i17no69l1i5j48cxi8x" />
    <title>

        @yield('pageTitle')

    </title>

    {{-- 頁面共通CSS --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- 頁面自訂CSS --}}

    @yield('css')

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '520514866883077', {
            user_id: 'anonymous_user_id'
        });
        fbq('track', 'PageView');

        // 傳送資料


    </script>
    <script>
         let formData = new FormData();
        formData.append('_method', 'POST');
        formData.append('_token', '{{ csrf_token() }}');


        fetch('/trackEvent', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })

            .then(response => {
                console.log(response);
                if (response.ok) {
                    return response.json();
                }
                throw new Error('請求失敗');
            })
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=520514866883077&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body>
    <nav>
        <!-- logo -->
        <div class="container-xxl d-flex justify-content-lg-between ">
            <div class="logo w-25"><a href="/"><img class="w-100" src="{{ asset('img/logo/logo.png') }}"
                        alt=""></a></div>
            <!-- 相關超連結 -->
            @auth

                <ul class="nav justify-content-end align-content-center">

                    <li class="nav-item2">
                        <a class="nav-link" href="/ordermanage">訂單管理</a>
                    </li>

                    <li class="nav-item2">
                        <a class="nav-link" href="/comment">心情留言板</a>
                    </li>

                    <li class="nav-item2">
                        <a class="nav-link" href="/checkedout1">購物車</a>
                    </li>

                    <li class="nav-item2 d-flex align-items-center">
                        <div style="color:#598987;"> {{ Auth::user()->name }} 　</div> 會員您好
                    </li>
                    <li class="d-flex align-items-center justify-content-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('登出') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            @endauth

            @guest

                <ul class="nav justify-content-end align-content-center">
                    {{-- <li class="" >
                    <a class="nav-link" href="/banner">BANNER頁面</a>
                </li>
                <li class="nav-item2">
                    <a class="nav-link" href="/product">商品管理頁面</a>
                </li> --}}
                    {{-- <li class="nav-item2">
                    <a class="nav-link" href="/comment">心情留言板</a>
                </li>
                <li class="nav-item2">
                    <a class="nav-link" href="/checkedout1">購物車</i></a>
                </li> --}}
                    <li class="nav-item2 d-flex align-items-center">
                        <p class="mb-0"><a href="/login">請先登入</a> </p>
                    </li>
                </ul>
            @endguest


            <!-- 漢堡連結 -->
            <div class="burger-link ">
                <div class="burger-box">
                    <input type="checkbox" id="burger" hidden>
                    <label for="burger"><i class="fa-solid fa-align-justify"></i></label>
                    @auth

                        <ul class="nav justify-content-end align-content-center">
                            {{-- <li class="nav-item2">
                            <a class="nav-link" href="/banner">BANNER頁面</a>
                        </li>
                        <li class="nav-item2">
                            <a class="nav-link" href="/product">商品管理頁面</a>
                        </li> --}}
                            <li class="nav-item2">
                                <a class="nav-link" href="/comment">心情留言板</a>
                            </li>
                            <li class="nav-item2">
                                <a class="nav-link" href="/checkedout1">購物車</a>
                            </li>
                            <li class="nav-item2">
                                親愛的 {{ Auth::user()->name }} 會員您好
                            </li>
                        </ul>
                    @endauth

                    @guest

                        <ul class="nav justify-content-end align-content-center">
                            {{-- <li class="nav-item2">
                            <a class="nav-link" href="/banner">BANNER頁面</a>
                        </li>
                        <li class="nav-item2">
                            <a class="nav-link" href="/product">商品管理頁面</a>
                        </li> --}}
                            <li class="nav-item2">
                                <a class="nav-link" href="/comment">心情留言板</a>
                            </li>
                            <li class="nav-item2">
                                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            </li>


                            <li class="nav-item2">
                                <p>請先登入</p>
                                <div class="login-remind ">
                                    <P>Login</P>
                                </div>

                            </li>
                        </ul>
                    @endguest


                </div>
            </div>
        </div>
    </nav>
    <main>

        @yield('main')

    </main>
    <footer>
        <!-- 網頁其他資訊 -->
        <!-- 資訊1 -->
        <div class="other-info1 d-flex align-items-center">
            <div class="l-box">
                <div class="logo w-100 ">
                    <img class="w-100 rounded-0" src="{{ asset('img/logo/logo.png') }}" alt="little logo" />
                    {{-- <span>數位方塊</span> --}}
                </div>
                <div class="info">
                    <p>Air plant banjo lyft occupy retro adaptogen indego</p>
                </div>
            </div>
            <div class="r-box d-flex justify-content-around">
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
                <ul>
                    <li>
                        <h6>CATEGORIES</h6>
                    </li>
                    <li><a>First Link</a></li>
                    <li><a>Second Link</a></li>
                    <li><a>Third Link</a></li>
                    <li><a>Fourth Link</a></li>
                </ul>
            </div>
        </div>
        <!-- 資訊2 -->
        <div class="other-info2">
            <div class="container d-flex align-items-center justify-content-between">
                <p>© 2020 Tailblocks — @善良的人</p>
                <div class="svg">
                    <img src="{{ asset('img/some-svg/facebook.svg') }}" alt="">
                    <img src="{{ asset('img/some-svg/twitter.svg') }}" alt="">
                    <img src="{{ asset('img/some-svg/instagram.svg') }}" alt="">
                    <img src="{{ asset('img/some-svg/linkedin.svg') }}" alt="">
                </div>
            </div>
        </div>
    </footer>

    {{-- 頁面共通Js --}}

    <script src="https://kit.fontawesome.com/1b22cb82e7.js" crossorigin="anonymous"></script>

    {{-- 頁面自訂Js --}}

    @yield('Js')

</body>

</html>
