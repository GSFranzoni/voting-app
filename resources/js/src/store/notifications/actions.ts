import {AddNotificationRequestAction, NotificationsActionsEnum, NotificationType} from "./types";

export const addNotification = (notification: NotificationType): AddNotificationRequestAction => {
    return {
        type: NotificationsActionsEnum.ADD_NOTIFICATION,
        payload: notification
    }
}
