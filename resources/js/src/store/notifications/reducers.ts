import {
    NotificationsActionsEnum,
    NotificationsActionsType,
    NotificationsInitialState,
    NotificationsState
} from "./types";

const NotificationsReducer = (state: NotificationsState = NotificationsInitialState, action: NotificationsActionsType) => {
    switch (action.type) {
        case NotificationsActionsEnum.ADD_NOTIFICATION:
            return [ ...state, action.payload ]
        default:
            return state;
    }
}

export default NotificationsReducer
