import { connect, ConnectedProps } from 'react-redux'
import { logoutRequest } from "../../../../store/auth/actions";
import {AppState} from "../../../../store";

const mapState = (state: AppState) => ({
    user: state.auth.user,
    loading: state.auth.loading
})


const mapDispatch = {
    logout: logoutRequest
}

export const connector = connect(mapState, mapDispatch)

export type DropdownMenuProps = ConnectedProps<typeof connector>
