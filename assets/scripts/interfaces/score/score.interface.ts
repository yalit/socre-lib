import {array, InferType, object, string} from "yup";
import {scoreReferenceSchema} from "./scoreReference.interface";
import {artistSchema} from "./artist.interface";
import {scoreCategorySchema} from "./scoreCategory.interface";
import {scoreFileSchema} from "./scoreFile.interface";

export const scoreSchema = object({
    id: string().required(),
    title: string().required(),
    description: string().optional(),
    refs: array().of(scoreReferenceSchema).required(),
    artists: array().of(artistSchema).required(),
    categories: array().of(scoreCategorySchema).required(),
    files: array().of(scoreFileSchema).required(),
})

export interface Score extends InferType<typeof scoreSchema> {}
