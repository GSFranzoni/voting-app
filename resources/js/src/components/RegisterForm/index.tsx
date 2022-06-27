import React, { useEffect } from "react";
import { Button, Flex, Stack } from "@chakra-ui/react";
import AppTextField from "../Shared/AppTextField";
import useForm from "../../hooks/Form";
import { RegisterUserType } from "../../types/Auth";
import {connector, RegisterFormProps } from "./props";
import {useNavigate} from "react-router-dom";

const RegisterForm = ({ loading, authenticated, register }: RegisterFormProps) => {
    const [user, setUser, userIsValid] = useForm<RegisterUserType>({
        name: undefined,
        email: undefined,
        password: undefined
    })

    const navigate = useNavigate()

    useEffect(() => {
        authenticated && navigate('/')
    }, [authenticated])

    return <Stack gap={2}>
        <AppTextField
            label={'Name'}
            name={'register-name'}
            value={user.name}
            type={'text'}
            disabled={loading}
            onChange={((value: string) => setUser('name', value))}
        />
        <AppTextField
            label={'Email adress'}
            name={'register-email'}
            value={user.email}
            type={'email'}
            disabled={loading}
            onChange={((value: string) => setUser('email', value))}
        />
        <AppTextField
            label={'Password'}
            name={'register-password'}
            value={user.password}
            type={'password'}
            disabled={loading}
            onChange={((value: string) => setUser('password', value))}
        />
        <Flex direction={'row'} justifyContent={'flex-end'}>
            <Button
                size={'md'}
                colorScheme={'green'}
                onClick={() => register(user)}
                isLoading={loading}
                disabled={!userIsValid || loading}
            >Submit</Button>
        </Flex>
    </Stack>
}

export default connector(RegisterForm)
