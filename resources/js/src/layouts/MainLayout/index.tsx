import React, {PropsWithChildren, useEffect} from "react";
import { Outlet } from 'react-router-dom';
import Nav from "./components/Nav";
import { Box } from "@chakra-ui/react";

type MainLayoutProps = PropsWithChildren<any> & {
    title: string
}

const MainLayout: React.FC<MainLayoutProps> = (props: MainLayoutProps) => {
    return <Box>
        <Nav/>
        <Box p={2} py={5}>
            <Outlet/>
        </Box>
    </Box>
}

export default MainLayout
