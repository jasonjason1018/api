<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>H4CK3D</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="icon" href="/images/favicon.ico">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #000;
            color: #0f0;
            font-family: 'Share Tech Mono', monospace;
            height: 100vh;
            margin: 0;
            overflow: hidden;

        }

        ::selection {
            background: #0f0;
            color: #000;
        }

        .matrix-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.07;
            z-index: -1;
            overflow: hidden;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
            z-index: 10;
        }

        .content {
            text-align: center;
            border: 1px solid #0f0;
            padding: 2rem;
            background-color: rgba(0, 10, 0, 0.7);
            box-shadow: 0 0 15px #0f0;
            animation: pulse 2s infinite alternate;
        }

        .title {
            font-size: 72px;
            /*text-transform: uppercase;*/
            letter-spacing: 5px;
            margin-bottom: 20px;
            text-shadow: 0 0 10px #0f0;
        }

        /*.title::before {*/
        /*    content: "Laravel";*/
        /*    margin-right: 10px;*/
        /*    animation: blink 1s infinite;*/
        /*}*/

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        @keyframes pulse {
            from { box-shadow: 0 0 5px #0f0; }
            to { box-shadow: 0 0 20px #0f0; }
        }

        .links > a {
            color: #0f0;
            padding: 0.5rem 1.5rem;
            font-size: 0.8rem;
            font-weight: bold;
            letter-spacing: .2rem;
            text-decoration: none;
            text-transform: uppercase;
            border: 1px solid #0f0;
            margin: 0 10px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .links > a:hover {
            background-color: #0f0;
            color: #000;
        }

        .links > a:hover::before {
            left: 100%;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .version-info {
            position: fixed;
            bottom: 10px;
            left: 10px;
            font-size: 10px;
            opacity: 0.5;
        }

        .access-status {
            position: fixed;
            top: 10px;
            left: 10px;
            font-size: 12px;
        }

        .access-status span {
            animation: blink 1.5s infinite;
        }
    </style>
</head>
<body>
<div class="matrix-bg" id="matrix"></div>
<div class="access-status">
    <span>SYSTEM ACCESS:</span> GRANTED
</div>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">Laravel</div>

        <div class="links">
            <a href="/todo">TODO LIST</a>
        </div>
    </div>
</div>

<div class="version-info">
    v5.7.29 | ROOT:ENABLED | SERVER:COMPROMISED
</div>


</script>
</body>
</html>
