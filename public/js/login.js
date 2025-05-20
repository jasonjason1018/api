const checkColumns = [
    { column_id: 'username', error_message_id: 'username-error', column_lang_tw: '使用者 ID '},
    { column_id: 'password', error_message_id: 'password-error', column_lang_tw: '密碼' }
];

$('#login-btn').click(function () {
    $('.error-message').hide();

    let hasError = false;
    let loginData = {};

    checkColumns.forEach((column) => {
        const columnValue = $(`#${column.column_id}`).val();
        loginData[column.column_id] = columnValue;

        if (!columnValue) {
            $(`#${column.error_message_id}`).text(`${column.column_lang_tw}不可為空`).show();
            hasError = true;
        }
    });

    if (!hasError) {
        checkLoginIsSuccess(loginData);
    }
});

function checkLoginIsSuccess (loginData) {
    axiosInstance.post('/account/login', loginData)
        .then(({data, code}) => {
            window.location.href = '/dashboard'
        })
        .catch((error) => {
            checkColumns.forEach((column) => {
                $(`#${column.column_id}`).val('')
                $(`#${column.error_message_id}`).text(`請確認${column.column_lang_tw}是否正確`).show();
            });

        });
}
