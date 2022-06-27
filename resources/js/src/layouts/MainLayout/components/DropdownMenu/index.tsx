import React from "react";import {
    Avatar,
    HStack,
    VStack,
    Text,
    Menu,
    MenuButton,
    MenuItem,
    MenuList
} from '@chakra-ui/react';
import {
    FiChevronDown,
} from 'react-icons/fi';
import { ImExit } from "react-icons/im";
import { SettingsIcon } from "@chakra-ui/icons";
import {connector, DropdownMenuProps} from "./props";
import AppLoading from "../../../../components/Shared/AppLoading";

const DropdownMenu = ({ logout, user, loading }: DropdownMenuProps) => {
    return <Menu>
        <MenuButton
            transition="all 0.3s"
            _focus={{ boxShadow: 'none' }}>
            <HStack>
                <Avatar
                    size={'sm'}
                    src={'https://static.vecteezy.com/system/resources/thumbnails/002/275/847/small/male-avatar-profile-icon-of-smiling-caucasian-man-vector.jpg'}
                />
                <VStack
                    display={{ base: 'none', md: 'flex' }}
                    alignItems="flex-start"
                    spacing="1px"
                    ml="2">
                    <Text fontSize="sm">{user?.name}</Text>
                    <Text fontSize="xs" color="gray.600">
                        {user?.email}
                    </Text>
                </VStack>
                <FiChevronDown />
            </HStack>
        </MenuButton>
        <MenuList alignItems={'center'}>
            <MenuItem icon={<SettingsIcon />}>
                Settings
            </MenuItem>
            <MenuItem icon={<ImExit />} onClick={() => logout()}>
                Logout
            </MenuItem>
        </MenuList>
        <AppLoading loading={!!loading} />
    </Menu>
}

export default connector(DropdownMenu)
