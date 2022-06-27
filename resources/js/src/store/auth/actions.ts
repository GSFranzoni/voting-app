import {
    AuthActionsEnum,
    FetchUserFailedAction,
    FetchUserRequestAction,
    FetchUserSuccessAction,
    LoginFailedAction,
    LoginRequestAction,
    LoginSuccessAction,
    LogoutFailedAction,
    LogoutRequestAction,
    LogoutSuccessAction, RegisterFailedAction, RegisterRequestAction, RegisterSuccessAction,
} from "./types";
import {LoginUserType, RegisterUserType, UserType} from "../../types/Auth";

export const loginRequest = (user: LoginUserType): LoginRequestAction => {
    return {
        type: AuthActionsEnum.LOGIN_REQUEST,
        payload: user
    }
}

export const loginSuccess = (token: string): LoginSuccessAction => {
    return {
        type: AuthActionsEnum.LOGIN_SUCCESS,
        payload: token
    }
}

export const loginFailed = (error: string): LoginFailedAction => {
    return {
        type: AuthActionsEnum.LOGIN_FAILED,
        payload: error
    }
}


export const registerRequest = (user: RegisterUserType): RegisterRequestAction => {
    return {
        type: AuthActionsEnum.REGISTER_REQUEST,
        payload: user
    }
}

export const registerSuccess = (): RegisterSuccessAction => {
    return {
        type: AuthActionsEnum.REGISTER_SUCCESS
    }
}

export const registerFailed = (error: string): RegisterFailedAction => {
    return {
        type: AuthActionsEnum.REGISTER_FAILED,
        payload: error
    }
}

export const fetchUserRequest = (): FetchUserRequestAction => {
    return {
        type: AuthActionsEnum.FETCH_USER_REQUEST
    }
}

export const fetchUserSuccess = (user: UserType): FetchUserSuccessAction => {
    return {
        type: AuthActionsEnum.FETCH_USER_SUCCESS,
        payload: user
    }
}

export const fetchUserFailed = (error: string): FetchUserFailedAction => {
    return {
        type: AuthActionsEnum.FETCH_USER_FAILED,
        payload: error
    }
}

export const logoutRequest = (): LogoutRequestAction => {
    return {
        type: AuthActionsEnum.LOGOUT_REQUEST
    }
}

export const logoutSuccess = (): LogoutSuccessAction => {
    return {
        type: AuthActionsEnum.LOGOUT_SUCCESS
    }
}

export const logoutFailed = (error: string): LogoutFailedAction => {
    return {
        type: AuthActionsEnum.LOGOUT_FAILED,
        payload: error
    }
}
