import React, {useEffect} from "react";
import { useLocation, Navigate } from "react-router-dom";
import AppLoading from "../../components/Shared/AppLoading";
import { AuthGuardProps, connector } from "./props";

const AuthGuard = ({ authenticated, fetchUser, children }: AuthGuardProps) => {
    const location = useLocation()
    useEffect(() => {
        fetchUser()
    }, []);
    if (authenticated === undefined) {
        return <AppLoading loading={true} />;
    }
    if (!authenticated) {
        return <Navigate to="auth" state={{ from: location }} replace />
    }
    return children
}

export default connector(AuthGuard)
