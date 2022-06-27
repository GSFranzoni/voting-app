import React, {ChangeEvent} from 'react'
import { AppTextFieldProps } from "./types";
import { FormControl, FormErrorMessage, FormLabel, Input } from "@chakra-ui/react";

const AppTextField: React.FC<AppTextFieldProps> = (props: AppTextFieldProps) => {
    const invalid = props.value === ''
    return <FormControl isInvalid={invalid}>
        <FormLabel htmlFor='email'>{props.label}</FormLabel>
        <Input
            id={props.name}
            type={props.type}
            value={props.value || ''}
            variant={'filled'}
            disabled={props.disabled}
            onChange={(event: ChangeEvent<HTMLInputElement>) => props.onChange(event.target.value)}
        />
        {invalid && <FormErrorMessage>{props.label} is required.</FormErrorMessage>}
    </FormControl>
}

export default AppTextField
