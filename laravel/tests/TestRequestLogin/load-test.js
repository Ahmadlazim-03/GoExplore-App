import http from 'k6/http';
import { check, sleep } from 'k6';

export let options = {
    stages: [
        { duration: '30s', target: 50 },  // Naik ke 50 user dalam 30 detik
        { duration: '1m', target: 100 },  // Naik ke 100 user selama 1 menit
        { duration: '30s', target: 0 },   // Turun kembali ke 0 user
    ],
    thresholds: {
        http_req_duration: ['p(95)<500'], // 95% request harus selesai di bawah 500ms
        http_req_failed: ['rate<0.1'],    // Error rate tidak boleh lebih dari 10%
    },
};

export default function () {
    let url = 'http://localhost:8000/login'; // Sesuaikan dengan endpoint login

    let payload = JSON.stringify({
        email: 'user@gmail.com',
        password: '12345678'
    });

    let params = {
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
    };

    let res = http.post(url, payload, params);

    check(res, {
        'status is 200': (r) => r.status === 200,
        'redirect exists': (r) => r.json('redirect') !== undefined, // Pastikan ada redirect
        'login failed check': (r) => r.status === 401 || r.json('error') !== undefined // Cek jika gagal
    });

    sleep(1); // Tunggu 1 detik sebelum request berikutnya
}
