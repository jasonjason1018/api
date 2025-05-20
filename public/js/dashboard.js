$('#logout').click(function () {
    axiosInstance.delete('/cookie');
    window.location.href = '/';
});
