const axiosInstance = axios.create({
    baseURL: '/api',
    timeout: 10000,
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
});


// axiosInstance.interceptors.request.use(config => {
//     const token = localStorage.getItem('token'); // 或從 meta 抓 CSRF
//     if (token) {
//         config.headers.Authorization = `Bearer ${token}`;
//     }
//     return config;
// });

axiosInstance.interceptors.response.use(
    response => response,
    error => {
        const status = error.response?.status;
        const message = error.response?.data?.message || '';

        if (status === 401) {
            window.location.href = '/';
        }

        console.error('API Error:', error.response?.data || error.message);
        return Promise.reject(error);
    }
);
