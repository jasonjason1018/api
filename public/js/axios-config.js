// public/js/axios-config.js
const axiosInstance = axios.create({
    baseURL: '/api', // 假設你 Laravel 的 API route 都走 /api 開頭
    timeout: 10000,
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
});

// 🔐 你可以加 token（看你怎麼存的，像 localStorage 或是 meta 標籤）
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
        console.error('API Error:', error.response?.data || error.message);
        return Promise.reject(error);
    }
);
