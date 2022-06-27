import { Link as ChakraLink, useColorModeValue } from "@chakra-ui/react";
import { NavLink as NavLinkReact } from 'react-router-dom'
import React, {ReactElement} from "react";

type NavLinkProps = {
    label: string,
    path: string
}

const NavLink: React.FC<NavLinkProps> = ({ path, label }) => {
    return <ChakraLink
        as={NavLinkReact}
        px={2}
        py={1}
        rounded={'md'}
        _hover={{
            textDecoration: 'none',
            bg: useColorModeValue('gray.200', 'gray.700'),
        }}
        _activeLink={{
            fontWeight: 'bold',
            color: 'green.500'
        }}
        to={path}>
        {label}
    </ChakraLink>
}

export default NavLink
