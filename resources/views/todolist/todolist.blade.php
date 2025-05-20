<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/css/todolist.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/axios.min.js"></script>
    <script src="/js/axios-config.js"></script>
</head>
<body>
<div class="container">
    <div class="terminal-header">
        <a href="/dashboard" class="demo-button">TO INDEX</a>
        <h1>TODO LIST</h1>
        <span class="terminal-prompt blinking-cursor">楷右的任務管理系統 v1.0 已啟動</span>
    </div>

    任務內容
    <div class="add-task-form">
        <textarea style="resize:none" class="task-input" name="task-content" id="task-content" cols="30" rows="10"></textarea>
{{--        <input type="text" id="task-content" autocomplete="off" class="task-input" placeholder="輸入新任務...">--}}
    </div>
    <button class="add-button" id="create-task">新增任務</button>

    <!-- 演示控制區 -->
    <div class="demo-controls">
        <h3 class="demo-title" id="now-status"></h3>
        <div class="demo-buttons" id='list-status'>

        </div>
    </div>
    <ul class="task-list" id="task-list">
        <center>Loading</center>
    </ul>
</div>

<div id="popup-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">編輯任務</h3>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <button class="modal-button" id="popup-hit-the-api" data-id>確定</button>
            <button class="modal-button cancel" id="cancel-popup-modal">取消</button>
        </div>
    </div>
</div>
<script src="/js/todolist.js"></script>
</body>
</html>
