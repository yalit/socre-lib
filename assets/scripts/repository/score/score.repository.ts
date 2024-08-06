import {Score, scoreSchema} from "../../interfaces/score/score.interface";
import apiFetch from "../../api/api.fetcher";
import apiRouter from "../../api/api.router";

const ScoreRepository = {
    getLatest: async (nbItems: number = 5): Promise<Score[]> => {
        const scoreData = await apiFetch(apiRouter.generate('score', 'all', {}, {itemsPerPage: 5}));
        return scoreData["hydra:member"].map((score: any) => scoreSchema.cast(score));
    }
}

export default ScoreRepository;
