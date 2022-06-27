
export enum NotificationsActionsEnum {
    ADD_NOTIFICATION = "@app:ADD_NOTIFICATION"
}

export type AddNotificationRequestAction = {
    type: NotificationsActionsEnum.ADD_NOTIFICATION,
    payload: NotificationType
}

export type NotificationsActionsType = AddNotificationRequestAction

export type NotificationType = {
    status: 'error' | 'warning' | 'success',
    message: string
}

export type NotificationsState = NotificationType[]

export const NotificationsInitialState: NotificationsState = []
