import React, {useEffect} from "react";
import { Button, Flex, Stack } from "@chakra-ui/react";
import useForm from "../../hooks/Form";
import AppTextField from "../Shared/AppTextField";
import { connector } from "./props";
import { ConnectedProps } from "react-redux";
import { useNavigate } from "react-router-dom";
import { LoginUserType } from "../../types/Auth";

const LoginForm = (props: ConnectedProps<typeof connector>) => {
    const [user, setUser, userIsValid] = useForm<LoginUserType>({
        email: undefined,
        password: undefined
    })

    const navigate = useNavigate()

    useEffect(() => {
        props.authenticated && navigate('/')
    }, [props.authenticated])

    return <Stack gap={2}>
        <AppTextField
            label={'Email adress'}
            name={'login-email'}
            value={user.email}
            type={'email'}
            disabled={props.loading}
            onChange={((value: string) => setUser('email', value))}
        />
        <AppTextField
            label={'Password'}
            name={'login-password'}
            value={user.password}
            type={'password'}
            disabled={props.loading}
            onChange={((value: string) => setUser('password', value))}
        />
        <Flex direction={'row'} justifyContent={'flex-end'}>
            <Button
                size={'md'}
                colorScheme={'green'}
                onClick={() => props.login(user)}
                isLoading={props.loading}
                disabled={!userIsValid || props.loading}
            >Submit</Button>
        </Flex>
    </Stack>
}

export default connector(LoginForm);
