import api from "../http/api";
import {AxiosResponse} from "axios";
import {LoginUserType, RegisterUserType, UserType} from "../types/Auth";

const login = async (user: LoginUserType): Promise<UserType> => {
    try {
        const response: AxiosResponse = await api.post('/users/auth', user)
        const token = response.data.body
        return loginWithToken(token)
    }
    catch (e: any) {
        throw new Error(e.response.data.error)
    }
}

const loginWithToken = async (token: string): Promise<UserType> => {
    try {
        const response: AxiosResponse = await api.get('/users/me')
        return response.data.body as UserType
    }
    catch (e: any) {
        throw new Error(e.response.data.error)
    }
}

const register = (user: RegisterUserType): Promise<void> => {
    return new Promise<void>((resolve, reject) => setTimeout(() => {
        resolve()
    }, 1000))
}

const logout = () => {
    return new Promise<void>((resolve, reject) => setTimeout(() => {
        resolve()
    }, 1000))
}

export default {
    login, loginWithToken, logout, register
}
