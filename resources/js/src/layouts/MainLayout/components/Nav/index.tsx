import React from 'react';
import {
    Box,
    Flex,
    IconButton,
    useColorModeValue, useBoolean, Button, BoxProps, Collapse,
} from '@chakra-ui/react';
import DropdownMenu from "../DropdownMenu";
import MobileNav from "./Mobile";
import DesktopNav from "./Desktop";
import {AddIcon, CloseIcon, HamburgerIcon} from "@chakra-ui/icons";
import ToggleThemeButton from "../ToggleThemeButton";
import {useNavigate} from "react-router-dom";

const Nav: React.FC<BoxProps> = () => {
    const [ open, setOpen ] = useBoolean(false);
    const navigate = useNavigate()
    return <Box bg={useColorModeValue('gray.100', 'gray.900')} px={4}>
        <Flex h={16} alignItems={'center'} justifyContent={'space-between'}>
            <IconButton
                size={'md'}
                icon={open ? <CloseIcon /> : <HamburgerIcon />}
                aria-label={'Open Menu'}
                display={{ md: 'none' }}
                onClick={setOpen.toggle}
            />
            <DesktopNav />
            <Flex gap={2}>
                <IconButton
                    colorScheme={'green'}
                    size={'md'}
                    icon={<AddIcon />}
                    aria-label={'Create Poll'}
                    onClick={() => navigate('/polls/create')}
                />
                <ToggleThemeButton />
                <DropdownMenu />
            </Flex>
        </Flex>
        <Collapse in={open} animateOpacity>
            <MobileNav />
        </Collapse>
    </Box>
}

export default Nav
