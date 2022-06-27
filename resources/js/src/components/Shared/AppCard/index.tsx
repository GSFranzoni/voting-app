import React from "react";
import {CardContainer, CardContent, CardHeader, CardTitle} from "./styles";
import { CardProps } from "./types";
import {BoxProps} from "@chakra-ui/react";

const AppCard: React.FC<CardProps> = (props: CardProps) => {
    return <CardContainer { ...props as BoxProps } margin={0}>
        <CardHeader>
            <CardTitle>
                { props.title }
            </CardTitle>
        </CardHeader>
        <CardContent>
            {props.children}
        </CardContent>
    </CardContainer>
}

export default AppCard
