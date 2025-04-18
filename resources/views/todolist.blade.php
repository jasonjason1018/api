<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <link rel="stylesheet" href="/css/todolist.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/axios.min.js"></script>
    <script src="/js/axios-config.js"></script>
</head>
<body>
<div class="container">
    <div class="terminal-header">
        <h1>TODO LIST</h1>
        <span class="terminal-prompt blinking-cursor">楷右的任務管理系統 v1.0 已啟動</span>
    </div>

    任務內容
    <div class="add-task-form">
        <input type="text" id="task-content" class="task-input" placeholder="輸入新任務...">
    </div>
    <button class="add-button" id="create-task">新增任務</button>

    <!-- 演示控制區 -->
    <div class="demo-controls">
        <h3 class="demo-title">分類:</h3>
        <div class="demo-buttons">
            <button class="demo-button">待處理</button>
            <button class="demo-button">確認中</button>
            <button class="demo-button">已完成</button>
        </div>
    </div>

{{--    <div id="normal"></div>--}}
{{--    <div id="completed"></div>--}}

    <ul class="task-list" id="task-list">

    </ul>
</div>

<div id="edit-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">編輯任務</h3>
            <a href="#" class="modal-close">&times;</a>
        </div>
        <div class="modal-body">
            <input type="text" class="modal-edit-input" value="破解防火牆密碼">
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-button">保存</a>
            <a href="#" class="modal-button cancel">取消</a>
        </div>
    </div>
</div>

<!-- 刪除任務彈窗 -->
<div id="delete-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">刪除任務</h3>
            <a href="#" class="modal-close">&times;</a>
        </div>
        <div class="modal-body">
            <p id="delete-confirm-message">確定要刪除任務「破解防火牆密碼」嗎？</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-button">確定</a>
            <a href="#" class="modal-button cancel">取消</a>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#task-delete', function () {
        taskContent = $(this).data('content')
        $('#delete-confirm-message').text(`確定要刪除任務「${taskContent}」嗎？`)
    });

    $('#create-task').click(function() {
        const taskContentElement = $('#task-content');
        const taskContent = taskContentElement.val();

        if (!taskContent) {
            return false;
        }

        const params = {
            task_content: taskContent
        };

        axiosInstance.post('/todo/task', params)
            .catch(error => {
                console.log(error);
            })
            .finally(() => {
                taskContentElement.val('');
                getTaskList();
            });
    });

    function getTaskList() {
        axiosInstance.get('/todo/task')
            .then(({data, code}) => {
                const taskListElement = $('#task-list');
                const tasklist = data.result.map(getTaskHtml).join('');

                taskListElement.html(tasklist);
            });
    }

    function getTaskHtml(task) {
        return `<li class="task-item normal-state">
                    <span class="task-text">${task.task_content}</span>
                    <div class="task-actions">
                        <a href="#edit-status" class="task-edit">[變更狀態]</a>
                        <a href="#edit-modal" class="task-edit">[編輯]</a>
                        <a
                            href="#delete-modal"
                            data-id="${task.id_todolist}"
                            data-content="${task.task_content}"
                            class="task-delete"
                            id="task-delete"
                        >
                            [刪除]
                        </a>
                    </div>
                </li>`
    }

    $(document).ready(function () {
        getTaskList()
    });
</script>
</body>
</html>
