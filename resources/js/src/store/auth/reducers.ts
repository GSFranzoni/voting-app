import {AuthActionsEnum, AuthActionsType, AuthInitialState, AuthState} from "./types";

const AuthReducer = (state: AuthState = AuthInitialState, action: AuthActionsType) => {
    switch (action.type) {
        case AuthActionsEnum.FETCH_USER_REQUEST:
            return { ...state, loading: true, error: '' }
        case AuthActionsEnum.LOGIN_REQUEST:
            return { ...state, user: undefined, loading: true, error: '' }
        case AuthActionsEnum.FETCH_USER_SUCCESS:
            return { ...state, user: action.payload, loading: false, authenticated: true, error: '' }
        case AuthActionsEnum.LOGIN_SUCCESS:
            return { ...state, user: { ...state.user, token: action.payload }, loading: false, authenticated: true, error: '' }
        case AuthActionsEnum.FETCH_USER_FAILED: case AuthActionsEnum.LOGIN_FAILED:
            return { ...state, user: undefined, authenticated: false, loading: false, error: action.payload }
        case AuthActionsEnum.LOGOUT_REQUEST:
            return { ...state, loading: true }
        case AuthActionsEnum.LOGOUT_SUCCESS:
            return { ...state, user: undefined, authenticated: false, loading: false }
        case AuthActionsEnum.LOGOUT_FAILED:
            return { ...state, error: action.payload, loading: false }
        default:
            return state;
    }
}

export default AuthReducer
