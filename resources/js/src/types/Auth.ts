
export interface LoginUserType {
    email?: string,
    password?: string
}

export type RegisterUserType = {
    name?: string,
    email?: string,
    password?: string
}

export type UserType = {
    id?: string,
    name: string,
    email: string,
    token: string
}
