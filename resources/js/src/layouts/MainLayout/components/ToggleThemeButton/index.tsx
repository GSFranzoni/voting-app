import React from "react";
import {MoonIcon, SunIcon} from "@chakra-ui/icons";
import { IconButton, useColorMode } from "@chakra-ui/react";

const ToggleThemeButton: React.FC = () => {
    const { colorMode, toggleColorMode } = useColorMode()
    return <IconButton
        size={'md'}
        icon={colorMode === 'light'? <MoonIcon />: <SunIcon />}
        onClick={toggleColorMode}
        aria-label={'Toggle night mode'}
    />
}

export default ToggleThemeButton
