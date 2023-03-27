<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入頁面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">


    {{-- google 客戶端登入API  --}}


    {{-- <script src="https://apis.google.com/js/platform.js" async defer></script> --}}

    {{-- <script src="https://apis.google.com/js/platform.js" async="async"></script> --}}
    {{-- <meta name="google-signin-client_id" --}}
    {{-- content="504504813723-pdjup76aefhscls8ulm2usl5q68io3u6.apps.googleusercontent.com" /> --}}

</head>

<body>
    <main>
        <div class="banner d-flex">
            <!-- 左方區塊 -->
            <div id="section1">
                <!-- 左方區塊 -->
                <div class="left-box d-flex">
                    <!-- 左區塊標題 -->
                    <h3>Keep it special</h3>
                    <!-- 左區塊副標題 -->
                    <h5>Capture your personal memory in unique way, anywhere.</h5>
                </div>
            </div>
            <!-- 右方區塊 -->
            <div id="section2">
                <!-- 右方區塊 -->
                <div class="right-box d-flex">
                    <!-- LOGO -->
                    <div class="logo-box d-flex">
                        <div class="logo w-50">
                            <img class="w-100" src="./img/logo/logo.png" alt="">
                        </div>
                    </div>
                    <!-- SVG超連結 -->
                    <div class="svg-box d-flex">
                        <div class="box-top d-flex ">
                            <a href="{{ route('googlelogin') }}">
                                {{-- google登入 --}}
                                <img class="w-100" src="./img/login-page/google-login.png" alt="google-login-botton">
                            </a>
                        </div>
                    </div>
                    {{-- <!-- 使用其他方式登入 -->
                    <div class="box-bot d-flex">
                        <p>or use email your account </p>
                    </div> --}}
                    <!-- 登入表單 -->
                    <div class="login-form d-flex">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control email-adress"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control password"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>



                            <div id="emailHelp" class="form-text">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </div>

                            <button type="submit" class="btn btn-primary">SIGN IN</button>
                            <a href="/register"><button type="button" type="submit" class="btn btn-primary">SIGN
                                    UP</button></a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- logo連結 -->
            <div id="section3">
                <!-- svg連結 -->
                <div class="svg-link">
                    <div class="link1"><img src="./img/login-page/instagram-logo-fill.svg" alt=""></div>
                    <div class="link2"><img src="./img/login-page/instagram-logo-fill.svg" alt=""></div>
                    <div class="link3"><img src="./img/login-page/instagram-logo-fill.svg" alt=""></div>
                </div>
            </div>
        </div>
    </main>
    {{-- <script>
        /*
         * Create form to request access token from Google's OAuth 2.0 server.
         */
        function oauthSignIn() {
            // Google's OAuth 2.0 endpoint for requesting an access token
            var oauth2Endpoint = 'https://accounts.google.com/o/oauth2/v2/auth';

            // Create <form> element to submit parameters to OAuth 2.0 endpoint.
            var form = document.createElement('form');
            form.setAttribute('method', 'GET'); // Send as a GET request.
            form.setAttribute('action', oauth2Endpoint);

            // Parameters to pass to OAuth 2.0 endpoint.
            var params = {
                'client_id': '504504813723-pdjup76aefhscls8ulm2usl5q68io3u6.apps.googleusercontent.com',

            //此處URL需使用Ngrok.io以及在Google申請的帳號裡面修改相關授權網域.10/04
                'redirect_uri': 'https://ab93-118-233-192-185.jp.ngrok.io/googleapi',
                'response_type': 'token',
                'scope': 'https://www.googleapis.com/auth/drive.metadata.readonly',
                'include_granted_scopes': 'true',
                'state': 'pass-through value'
            };

            // Add form parameters as hidden input values.
            for (var p in params) {
                var input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', p);
                input.setAttribute('value', params[p]);
                form.appendChild(input);
            }

            // Add form to page and submit it to open the OAuth 2.0 endpoint.
            document.body.appendChild(form);
            form.submit();
        }
    </script> --}}

</body>

</html>
