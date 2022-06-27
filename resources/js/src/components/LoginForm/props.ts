import { connect } from 'react-redux'
import { loginRequest } from "../../store/auth/actions";
import { AppState } from "../../store";

const mapState = (state: AppState) => ({
    user: state.auth.user,
    loading: state.auth.loading,
    error: state.auth.error,
    authenticated: state.auth.authenticated
})

const mapDispatch = {
    login: loginRequest
}

export const connector = connect(mapState, mapDispatch)
