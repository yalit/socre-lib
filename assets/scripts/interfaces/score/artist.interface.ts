import {InferType, object, string} from "yup";

export const artistSchema = object({
    id: string().required(),
    name: string().required(),
    type: string().required(),
})

export interface Artist extends InferType<typeof artistSchema>{}
