import {connect, ConnectedProps} from 'react-redux'
import { AppState } from "../../store";
import { registerRequest } from '../../store/auth/actions';

const mapState = (state: AppState) => ({
    user: state.auth.user,
    loading: state.auth.loading,
    error: state.auth.error,
    authenticated: state.auth.authenticated
})

const mapDispatch = {
    register: registerRequest
}

export const connector = connect(mapState, mapDispatch)

export type RegisterFormProps = ConnectedProps<typeof connector>
