<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="icon" href="/images/favicon.ico">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/axios.min.js"></script>
    <script src="/js/axios-config.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            font-family: 'Courier New', monospace;
            color: #0f0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .matrix-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.2;
            z-index: -1;
        }

        .container {
            background-color: rgba(0, 20, 0, 0.7);
            border: 1px solid #0f0;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.5);
            padding: 30px;
            width: 350px;
            position: relative;
            z-index: 2;
        }

        .glitch-text {
            color: #0f0;
            font-size: 28px;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            text-shadow: 0 0 5px #0f0;
            /*animation: glitch 1s infinite;*/
        }

        @keyframes glitch {
            0% { text-shadow: 0 0 5px #0f0; transform: translateX(0); }
            5% { text-shadow: -2px 0 #ff0000; transform: translateX(2px); }
            10% { text-shadow: 2px 0 #00ffff; transform: translateX(-2px); }
            15% { text-shadow: 0 0 5px #0f0; transform: translateX(0); }
            85% { text-shadow: 0 0 5px #0f0; transform: translateX(0); }
            90% { text-shadow: -2px 0 #ff0000; transform: translateX(2px); }
            95% { text-shadow: 2px 0 #00ffff; transform: translateX(-2px); }
            100% { text-shadow: 0 0 5px #0f0; transform: translateX(0); }
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #0f0;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            border: 1px solid #0f0;
            color: #0f0;
            font-family: 'Courier New', monospace;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 10px #0f0;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: rgba(0, 50, 0, 0.8);
            border: 1px solid #0f0;
            color: #0f0;
            cursor: pointer;
            font-family: 'Courier New', monospace;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            background-color: rgba(0, 80, 0, 0.8);
            box-shadow: 0 0 15px #0f0;
        }

        /*.btn:before {*/
        /*    content: '';*/
        /*    position: absolute;*/
        /*    top: 0;*/
        /*    left: -100%;*/
        /*    width: 100%;*/
        /*    height: 2px;*/
        /*    background-color: #0f0;*/
        /*    animation: scanline 2s infinite linear;*/
        /*}*/

        @keyframes scanline {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .terminal {
            position: absolute;
            bottom: 10px;
            left: 10px;
            font-size: 12px;
            color: #0f0;
            opacity: 0.7;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .typing {
            white-space: nowrap;
            overflow: hidden;
            animation: typing 3s steps(40, end) infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        .debug-info {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 12px;
            color: #0f0;
            text-align: right;
        }

        .error-message {
            color: #ff3333;
            margin-top: 5px;
            font-size: 14px;
            display: none;
        }
    </style>
</head>
<body>
<canvas class="matrix-bg" id="matrix"></canvas>

<div class="container">
    <div class="glitch-text">登入</div>

    <form id="loginForm">
        <div class="form-group">
            <label for="username">使用者 ID</label>
            <input type="text" id="username" class="form-control" autocomplete="off">
            <div class="error-message" id="username-error"></div>
        </div>

        <div class="form-group">
            <label for="password">密碼</label>
            <input type="password" id="password" class="form-control">
            <div class="error-message" id="password-error"></div>
        </div>

        <button type="button" class="btn" id="login-btn">登入</button>
    </form>
</div>

<div class="terminal">
    <div class="typing">
        你好
    </div>
</div>

<div class="debug-info">
    <div id="ip-address">IP: 192.168.1.1</div>
    <div id="connection">CONNECTION: SECURE</div>
    <div id="encryption">ENCRYPTION: AES-256</div>
    <div id="attempts">LOGIN ATTEMPTS: 0/3</div>
</div>
</body>
<script src="/js/login.js"></script>
</html>
