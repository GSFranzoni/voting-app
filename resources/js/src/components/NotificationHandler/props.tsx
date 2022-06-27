import { connect, ConnectedProps } from 'react-redux'
import { AppState } from "../../store";
import { NotificationType } from "../../store/notifications/types";

const mapState = (state: AppState) => ({
    notifications: state.notifications as NotificationType[]
})

export const connector = connect(mapState, {})

export type NotificationHandlerProps = ConnectedProps<typeof connector>
