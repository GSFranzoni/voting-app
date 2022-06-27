import React from "react";
import {Box, Stack} from "@chakra-ui/react";
import NavLink from "../../NavLink";

const MobileNav: React.FC = () => {
    return <Box pb={4} display={{ md: 'none' }}>
        <Stack as={'nav'} spacing={4}>
            <NavLink label={'Home'} path={''} />
            <NavLink label={'Polls'} path={'/polls'} />
        </Stack>
    </Box>
}

export default MobileNav
