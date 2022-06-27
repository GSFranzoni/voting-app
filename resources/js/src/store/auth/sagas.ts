import {all, call, put, takeEvery} from 'redux-saga/effects'
import AuthService from "../../services/AuthService";
import {
    AuthActionsEnum,
    FetchUserRequestAction,
    LoginFailedAction,
    LoginRequestAction,
    LoginSuccessAction,
    LogoutRequestAction, RegisterFailedAction, RegisterRequestAction
} from "./types";
import { AuthActionCreators } from '..';
import { NotificationsActionCreators } from '..';
import Api, { removeAuthorization, setAuthorization } from "../../http/api";
import { AxiosResponse } from "axios";
import {LoginUserType, UserType} from "../../types/Auth";

function* loginRequest (action: LoginRequestAction) {
    try {
        const response: AxiosResponse = yield call(Api.post, '/users/auth', action.payload)
        const token: string = response.data.body
        yield put(AuthActionCreators.loginSuccess(token))
    }
    catch (error: any) {
        yield put(AuthActionCreators.loginFailed(error.response.data.error))
    }
}

function* loginSuccess (action: LoginSuccessAction) {
    setAuthorization(action.payload)
    yield put(NotificationsActionCreators.addNotification({
        status: 'success',
        message: 'You\'ve successfully logged in :)'
    }))
    yield put(AuthActionCreators.fetchUserRequest())
}

function* loginFailed (action: LoginFailedAction) {
    yield put(NotificationsActionCreators.addNotification({
        status: 'error',
        message: action.payload
    }))
}

function* registerRequest (action: RegisterRequestAction) {
    try {
        const response: AxiosResponse = yield call(Api.post, '/users/register', action.payload)
        yield put(AuthActionCreators.loginRequest(action.payload as LoginUserType))
    }
    catch (error: any) {
        yield put(AuthActionCreators.registerFailed(error.response.data.error))
    }
}

function* registerFailed (action: RegisterFailedAction) {
    yield put(NotificationsActionCreators.addNotification({
        status: 'error',
        message: action.payload
    }))
}

function* fetchUserRequest (action: FetchUserRequestAction) {
    try {
        const response: AxiosResponse = yield call(Api.get, '/users/me')
        const user: UserType = response.data.body
        yield put(AuthActionCreators.fetchUserSuccess(user))
    }
    catch (error: any) {
        yield put(AuthActionCreators.fetchUserFailed(error.response.data.error))
    }
}

function* logoutRequest (action: LoginRequestAction){
    try {
        // @ts-ignore
        const response = yield call(AuthService.logout)
        yield put(AuthActionCreators.logoutSuccess())
    }
    catch (error: any) {
        yield put(AuthActionCreators.logoutFailed(error))
    }
}

function* logoutSuccess (action: LogoutRequestAction) {
    removeAuthorization()
}

function* sagas() {
    yield all([
        takeEvery(AuthActionsEnum.LOGIN_REQUEST, loginRequest),
        takeEvery(AuthActionsEnum.LOGIN_SUCCESS, loginSuccess),
        takeEvery(AuthActionsEnum.LOGIN_FAILED, loginFailed),
        takeEvery(AuthActionsEnum.REGISTER_REQUEST, registerRequest),
        takeEvery(AuthActionsEnum.REGISTER_FAILED, registerFailed),
        takeEvery(AuthActionsEnum.FETCH_USER_REQUEST, fetchUserRequest),
        takeEvery(AuthActionsEnum.LOGOUT_REQUEST, logoutRequest),
        takeEvery(AuthActionsEnum.LOGOUT_SUCCESS, logoutSuccess)
    ]);
}

export default sagas
