import { extendTheme, type ThemeConfig } from '@chakra-ui/react'

export enum ColorModeEnum {
    light = 'light',
    dark = 'dark'
}

const config: ThemeConfig = {
    initialColorMode: ColorModeEnum.dark,
    useSystemColorMode: false
}

const theme = extendTheme({
    config
})

export default theme
