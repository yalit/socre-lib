import {InferType, object, string} from "yup";

export const scoreReferenceSchema = object({
    id: string().required(),
    value: string().required(),
})

export interface ScoreReference extends InferType<typeof scoreReferenceSchema>{}
