import React from "react";
import { Box, HStack, Text } from "@chakra-ui/react";
import NavLink from "../../NavLink";

const DesktopNav: React.FC = () => {
    return <HStack spacing={8} alignItems={'center'}>
        <Box>
            <Text as={'b'}>EZPOLL</Text>
        </Box>
        <HStack
            as={'nav'}
            spacing={4}
            display={{ base: 'none', md: 'flex' }}
        >
            <NavLink label={'Home'} path={''} />
            <NavLink label={'Polls'} path={'/polls'} />
        </HStack>
    </HStack>
}

export default DesktopNav
