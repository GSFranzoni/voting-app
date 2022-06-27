export type FormHookType<T> = [
    form: T,
    changeFormValue: (field: keyof T, value: string) => void,
    isValid: boolean
]
