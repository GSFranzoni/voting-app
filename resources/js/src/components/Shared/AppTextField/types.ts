import React from "react";

export type AppTextFieldProps = {
    label: string
    name: string
    value: string | undefined
    type?: React.HTMLInputTypeAttribute
    onChange: (value: string) => void
    disabled?: boolean
}
