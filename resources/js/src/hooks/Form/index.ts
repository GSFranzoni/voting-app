import {useEffect, useState} from "react";
import { FormHookType } from "./types";

export function useForm<T>(initialValue: T = {} as T): FormHookType<T> {
    const [ form, setForm ] = useState<T>(initialValue)
    const [ valid, setValid ] = useState<boolean>(false)

    useEffect(() => {
        // @ts-ignore
        setValid(Object.keys(form).filter((field: any) => !form[field]).length === 0)
    }, [form])

    const changeFormValue = (field: keyof T, value: string) => {
        setForm({ ...form, [field]: value })
    }

    return [
        form, changeFormValue, valid
    ]
}

export default useForm
