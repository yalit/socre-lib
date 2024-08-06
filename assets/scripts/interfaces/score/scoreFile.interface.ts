import {InferType, object, string} from "yup";

export const scoreFileSchema = object({
    id: string().required(),
    name: string().required(),
    extension: string().required(),
})

export interface ScoreFile extends InferType<typeof scoreFileSchema>{}
