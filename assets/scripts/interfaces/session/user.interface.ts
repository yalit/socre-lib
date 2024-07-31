import {InferType, object, string} from "yup";

export type UserRole = 'admin' | 'user'

export const userSchema = object({
    name: string().required(),
    email: string().required(),
    role: string<UserRole>().required(),
})

export interface User extends InferType<typeof userSchema> {}
