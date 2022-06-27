import axios from 'axios'

const api = axios.create({
    baseURL: 'http://127.0.0.1/api'
});

export const setAuthorization = (token: string) => {
    if (!token) {
        return localStorage.removeItem('@app:token')
    }
    api.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    localStorage.setItem('@app:token', token)
}

export const removeAuthorization = () => {
    localStorage.removeItem('@app:token')
    api.defaults.headers.common['Authorization'] = '';
}

setAuthorization(String(localStorage.getItem('@app:token')))

export default api
