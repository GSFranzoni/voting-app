import { connect, ConnectedProps } from 'react-redux'
import { AppState } from "../../store";
import { fetchUserRequest } from "../../store/auth/actions";
import { PropsWithChildren } from "react";

const mapState = (state: AppState) => ({
    authenticated: state.auth.authenticated
})

const mapDispatch = {
    fetchUser: fetchUserRequest
}

export const connector = connect(mapState, mapDispatch)

export type AuthGuardProps = ConnectedProps<typeof connector> & PropsWithChildren<any>
