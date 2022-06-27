import { connector, NotificationHandlerProps } from "./props";
import useNotify from "../../hooks/Notify";
import { useEffect } from "react";
import { NotificationType } from "../../store/notifications/types";

const NotificationHandler = ({ notifications }: NotificationHandlerProps) => {
    const { Notify } = useNotify()
    useEffect(() => {
        const notification = [...notifications].pop() as NotificationType
        if (notification) {
            Notify(notification.message, notification.status)
        }
    }, [notifications])
    return <></>
}

export default connector(NotificationHandler)
