import {Box, Heading} from "@chakra-ui/react";
import styled from "@emotion/styled";

export const CardContainer = styled(Box)({
    width: 350,
    maxWidth: '100%',
    borderWidth: '1px',
    borderRadius: '5px',
    boxSizing: 'border-box',
    overflow: 'hidden',
    padding: 25,
    margin: 0
})

export const CardTitle = styled(Heading)({
    border: 0,
    width: '350',
    maxWidth: '100%',
    borderWidth: '1px',
    borderRadius: 'lg',
    overflow: 'hidden',
    as: 'h3'
})

export const CardHeader = styled(Box)({
    paddingBottom: '25px'
})

export const CardContent = styled(Box)({
    padding: 0,
    margin: 0
})
