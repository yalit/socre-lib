import {InferType, object, string} from "yup";

export const scoreCategorySchema = object({
    id: string().required(),
    value: string().required(),
})

export interface ScoreCategory extends InferType<typeof scoreCategorySchema>{}
