import React from "react";
import { AbsoluteCenter, Spinner } from "@chakra-ui/react";

type AppLoadingProps = {
    loading: boolean
}

const AppLoading: React.FC<AppLoadingProps> = ({ loading }) => {
    return <>{loading && <AbsoluteCenter>
        <Spinner color='green.500' />
    </AbsoluteCenter>}</>
}

export default AppLoading
