<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <style>
            html, body {
                background-color: #6c2eb7;
                color: #fff;
                font-family: 'Segoe UI', Arial, sans-serif;
                font-weight: 400;
                height: 100vh;
                margin: 0;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .full-height {
                height: 100vh;
            }
            .content {
                text-align: center;
                background: rgba(255,255,255,0.08);
                padding: 40px 30px;
                border-radius: 18px;
                box-shadow: 0 8px 32px 0 rgba(44,0,84,0.25);
            }
            .error-code {
                font-size: 60px;
                font-weight: bold;
                color: #e0c3fc;
                margin-bottom: 10px;
                text-shadow: 2px 4px 12px #4b1768;
            }
            .message {
                font-size: 24px;
                font-weight: bold;
                color: #fff;
                text-shadow: 1px 2px 8px #4b1768;
                margin-bottom: 10px;
            }
            .subtitle {
                font-size: 18px;
                color: #e0c3fc;
                margin-bottom: 10px;
            }
            a {
                color: #fff;
                background: #8f5de8;
                padding: 10px 24px;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 500;
                transition: background 0.2s;
                margin-top: 20px;
                display: inline-block;
            }
            a:hover {
                background: #4b1768;
            }
        </style>
    </head>
    <body>
        <div class="flex-center full-height">
            <div class="content">
                <div class="error-code">
                    @yield('code')
                </div>
                <div class="image">
                    @yield('image')
                </div>
                <div class="message">
                    @yield('message')
                </div>
                <div class="subtitle">
                    @yield('subtitle')
                </div>
                <a href="{{ url('/') }}">Voltar para o início</a>
            </div>
        </div>
    </body>
</html>