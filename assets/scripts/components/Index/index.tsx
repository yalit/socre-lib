import {useState} from "react";
import {useQuery} from "react-query";
import ScoreRepository from "../../repository/score/score.repository";
import UserRepository from "../../repository/session/user.repository";
import {Score} from "../../interfaces/score/score.interface";
import IndexScoreTableLine from "./indexScoreTableLine";

export default function Index() {
    const { data: latestScores, isError, isLoading } = useQuery<Score[]>(
        'latestScores',
        () => ScoreRepository.getLatest(),
    );

    return (
        <>
            <h2 className="content__title text-2xl font-bold mb-6">
                Dashboard
            </h2>
            <div className="main__cards w-full grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-3 2xl:gap-7.5">
                <div className="card h-25">
                    <div className="card__title">
                        10
                    </div>
                    <div className="card__subtitle">
                        New score(s) this month
                    </div>
                </div>

                <div className="card h-25">
                    <div className="card__title">
                        275
                    </div>
                    <div className="card__subtitle">
                        Scores in the Library
                    </div>
                    <div className="card__action add medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                             stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                  d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                        </svg>
                        <span>New score</span>
                    </div>
                </div>

                <div className="card h-25">
                    <div className="card__title">
                        25
                    </div>
                    <div className="card__subtitle">
                        Set lists
                    </div>
                    <div className="card__action add medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                             stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                  d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"/>
                        </svg>
                        <span>New set list</span>
                    </div>
                </div>
            </div>

            <div className="latest_scores card w-full mt-6">
                <div className="card__title">Latest scores</div>
                <div className="card__content">
                    <div className="data__table">
                        <div className="data__table__header flex items-center">
                            <div className="data__table__header_cell w-3/12 lg:w-2/12">Name</div>
                            <div className="data__table__header_cell w-2/12">Cote</div>
                            <div className="data__table__header_cell w-3/12">Categories</div>
                            <div className="data__table__header_cell w-3/12">Composer</div>
                            <div className="data__table__header_cell flex-1"></div>
                        </div>
                        {isLoading &&
                            <IndexScoreTableLine score={null} />
                        }
                        {latestScores && (
                            latestScores.map((score, k) => (
                                <IndexScoreTableLine score={score} odd={k % 2 === 0} />
                            ))
                        )}
                    </div>
                </div>
            </div>
        </>
    )
}
