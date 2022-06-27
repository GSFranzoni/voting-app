import {LoginUserType, RegisterUserType, UserType} from "../../types/Auth";

export enum AuthActionsEnum {
    LOGIN_REQUEST = "@app:LOGIN_REQUEST",
    LOGIN_SUCCESS = "@app:LOGIN_SUCCESS",
    LOGIN_FAILED = "@app:LOGIN_FAILED",
    REGISTER_REQUEST = "@app:REGISTER_REQUEST",
    REGISTER_SUCCESS = "@app:REGISTER_SUCCESS",
    REGISTER_FAILED = "@app:REGISTER_FAILED",
    FETCH_USER_REQUEST = "@app:FETCH_USER_REQUEST",
    FETCH_USER_SUCCESS = "@app:FETCH_USER_SUCCESS",
    FETCH_USER_FAILED = "@app:FETCH_USER_FAILED",
    LOGOUT_REQUEST = "@app:LOGOUT_REQUEST",
    LOGOUT_SUCCESS = "@app:LOGOUT_SUCCESS",
    LOGOUT_FAILED = "@app:LOGOUT_FAILED"
}

export type LoginRequestAction = {
    type: AuthActionsEnum.LOGIN_REQUEST,
    payload: LoginUserType
}

export type LoginSuccessAction = {
    type: AuthActionsEnum.LOGIN_SUCCESS,
    payload: string
}

export type LoginFailedAction = {
    type: AuthActionsEnum.LOGIN_FAILED,
    payload: string
}

export type RegisterRequestAction = {
    type: AuthActionsEnum.REGISTER_REQUEST,
    payload: RegisterUserType
}

export type RegisterSuccessAction = {
    type: AuthActionsEnum.REGISTER_SUCCESS
}

export type RegisterFailedAction = {
    type: AuthActionsEnum.REGISTER_FAILED,
    payload: string
}

export type FetchUserRequestAction = {
    type: AuthActionsEnum.FETCH_USER_REQUEST
}

export type FetchUserSuccessAction = {
    type: AuthActionsEnum.FETCH_USER_SUCCESS,
    payload: UserType
}

export type FetchUserFailedAction = {
    type: AuthActionsEnum.FETCH_USER_FAILED,
    payload: string
}

export type LogoutRequestAction = {
    type: AuthActionsEnum.LOGOUT_REQUEST
}

export type LogoutSuccessAction = {
    type: AuthActionsEnum.LOGOUT_SUCCESS
}

export type LogoutFailedAction = {
    type: AuthActionsEnum.LOGOUT_FAILED,
    payload: string
}

export type AuthActionsType = LoginRequestAction
    | LoginSuccessAction
    | LoginFailedAction
    | RegisterRequestAction
    | RegisterSuccessAction
    | RegisterFailedAction
    | FetchUserRequestAction
    | FetchUserSuccessAction
    | FetchUserFailedAction
    | LogoutRequestAction
    | LogoutSuccessAction
    | LogoutFailedAction

export type AuthState = {
    readonly user?: UserType,
    readonly loading?: boolean,
    readonly authenticated?: boolean,
    readonly error?: string
}

export const AuthInitialState: AuthState = {
    user: {
        token: '',
        name: '',
        email: ''
    },
    authenticated: undefined,
    loading: false,
    error: ''
}
