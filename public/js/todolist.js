var statusList = {
    0: '待處理',
    1: '待確認',
    2: '已完成',
    3: '暫緩'
}

var status = 0;

$(document).on('click', '.list-status', function () {
    $('#task-list').html('<center>Loading...</center>');
    status = $(this).data('id');
    getTaskList()
});

$(document).on('click', '.switch-status', function () {
    const params = {
        status: $(this).data('id')
    }

    const idTodolist = $('#popup-hit-the-api').data('id')

    editTask(idTodolist, params)
});

$(document).on('click', '#open-switch-status-modal', function () {
    $('.modal-title').text('更改任務狀態');
    let html = '<center>';

    Object.keys(statusList).forEach((index) => {
        html += `<button class="demo-button switch-status" data-id="${index}">${statusList[index]}</button> `;
    });

    html += '</center>';

    $('.modal-body').html(html);
    $('#popup-hit-the-api').data('id', $(this).data('id')).hide()
    $('#popup-modal').css('display', 'flex');
})

function editTask (idTodolist, params) {
    axiosInstance.patch(`/todo/task/${idTodolist}`, params)
        .then(({data, code}) => {
            cancelPopupModal();
            getTaskList();
        })
}

$(document).on('click', '#open-edit-modal', function () {
    taskContent = $(this).data('content')
    $('.modal-title').text('編輯任務');
    $('.modal-body').html(`<textarea style="resize:none" cols="20" rows="10" class="task-input" id="popup-input"></textarea>`);
    $('#popup-input').val(`${taskContent}`);
    $('#popup-hit-the-api').data('id', $(this).data('id'))
    $('#popup-modal').css('display', 'flex');
});

$('#cancel-popup-modal').click(function () {
    cancelPopupModal();
});

function deleteTask (idTodolist) {
    axiosInstance.delete(`/todo/task/${idTodolist}`)
        .then(({data, code}) => {
            cancelPopupModal();
            getTaskList();
        })
}

function cancelPopupModal () {
    $('#popup-hit-the-api').show();
    $('#popup-modal').hide();
}

$('#popup-hit-the-api').click(function () {
    const idTodolist = $(this).data('id');
    const popupInput = $('#popup-input').val();

    if (popupInput == undefined) {
        deleteTask(idTodolist);
        return false;
    }

    const params = {
        task_content: popupInput
    };

    editTask(idTodolist, params);
});

$(document).on('click', '#open-delete-modal', function () {
    taskContent = $(this).data('content')
    $('.modal-title').text('刪除任務');
    $('#popup-input').hide();
    $('.modal-body').text(`確定要刪除任務「${taskContent}」嗎？`)
    $('#popup-hit-the-api').data('id', $(this).data('id'))
    $('#popup-modal').css('display', 'flex');
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
    $('#task-list').html('<center>Loading...</center>');
    $('#now-status').text(`目前分類: ${statusList[status]}`)

    const params = {
        status: status
    }

    axiosInstance.get('/todo/task', {params})
        .then(({data, code}) => {
            const taskListElement = $('#task-list');
            let tasklist = '<center>無資料</center>';

            if (data.result.length > 0) {
                tasklist = data.result.map(getTaskHtml).join('');
            }

            taskListElement.html(tasklist);
        });
}

function getTaskHtml(task) {
    let updatedAt = new Date(task.updated_at);
    let formatDate = updatedAt =>
        updatedAt.getFullYear() + '-' +
        ('0' + (updatedAt.getMonth() + 1)).slice(-2) + '-' +
        ('0' + updatedAt.getDate()).slice(-2) + ' ' +
        ('0' + updatedAt.getHours()).slice(-2) + ':' +
        ('0' + updatedAt.getMinutes()).slice(-2) + ':' +
        ('0' + updatedAt.getSeconds()).slice(-2);
    const content = task.task_content.replace(/\n/g, "<br>");
    return `<li class="task-item normal-state">
                    <span class="task-text">${content} <br> [${formatDate(updatedAt)}]</span>
                    <div class="task-actions">
                        <button class="demo-button" id="open-switch-status-modal" data-id="${task.id_todolist}">變更狀態</button>
                        <button class="demo-button" id="open-edit-modal" data-id="${task.id_todolist}" data-content="${task.task_content}">編輯</button>
                        <button class="demo-button" id="open-delete-modal" data-id="${task.id_todolist}" data-content="${task.task_content}">刪除</button>
                    </div>
                </li>`
}

function buildListStatus() {
    let html = '';

    Object.keys(statusList).forEach((index) => {
        html += `<button class="demo-button list-status" data-id="${index}">${statusList[index]}</button> `
    })

    $('#list-status').html(html);
}

$(document).ready(function () {
    getTaskList()
    buildListStatus()
});
