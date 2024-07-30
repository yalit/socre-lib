export default function Index() {

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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"/>
                        </svg>
                        <span>New set list</span>
                    </div>
                </div>
            </div>

            <div className="latest_scores card w-full p-6 mt-6">
                <div className="card__title">Latest scores</div>
                <div className="card__content">
                    <div className="data__table">
                        <div className="data__table__header flex items-center">
                            <div className="data__table__header_cell w-3/12 lg:w-2/12">Name</div>
                            <div className="data__table__header_cell w-2/12">Cote</div>
                            <div className="data__table__header_cell w-4/12">Categories</div>
                            <div className="data__table__header_cell w-2/12">Composer</div>
                            <div className="data__table__header_cell flex-1"></div>
                        </div>

                        <div className="data__table__line flex items-top odd">
                            <div className="data__table__cell w-3/12 lg:w-2/12">Ne rentrez pas chez vous comme avant</div>
                            <div className="data__table__cell w-2/12 ">
                                <span className="bubble">N-203</span>
                                <span className="bubble">@243</span>
                            </div>
                            <div className="data__table__cell w-4/12 ">
                                <span className="bubble">Sortie</span>
                                <span className="bubble">Pentecôte</span>
                                <span className="bubble">Esprit Saint</span>
                            </div>
                            <div className="data__table__cell w-2/12">L. Fagnant</div>
                            <div className="data__table__cell flex-1">
                                <span className="action">View</span>
                                <span className="action">Edit</span>
                                <span className="action">Delete</span>
                            </div>
                        </div>

                        <div className="data__table__line flex items-top even">
                            <div className="data__table__cell w-3/12 lg:w-2/12">Gloire à Dieu</div>
                            <div className="data__table__cell w-2/12 ">
                                <span className="bubble">A-130</span>
                            </div>
                            <div className="data__table__cell w-4/12 ">
                                <span className="bubble">Gloria</span>
                            </div>
                            <div className="data__table__cell w-2/12">M. Wackenheim</div>
                            <div className="data__table__cell flex-1">
                                <span className="action">View</span>
                                <span className="action">Edit</span>
                                <span className="action">Delete</span>
                            </div>
                        </div>

                        <div className="data__table__line flex items-top odd">
                            <div className="data__table__cell w-3/12 lg:w-2/12">Jésus le Christ</div>
                            <div className="data__table__cell w-2/12 ">
                                <span className="bubble">Taizé-112</span>
                                <span className="bubble">@123</span>
                            </div>
                            <div className="data__table__cell w-4/12 ">
                                <span className="bubble">P.U.</span>
                                <span className="bubble">Refrain</span>
                                <span className="bubble">Taizé</span>
                            </div>
                            <div className="data__table__cell w-3/12 lg:w-2/12">Taizé</div>
                            <div className="data__table__cell flex-1">
                                <span className="action">View</span>
                                <span className="action">Edit</span>
                                <span className="action">Delete</span>
                            </div>
                        </div>

                        <div className="data__table__line flex items-top even">
                            <div className="data__table__cell w-2/12">Je reviens vers Toi</div>
                            <div className="data__table__cell w-2/12 "></div>
                            <div className="data__table__cell w-4/12 ">
                                <span className="bubble">Kyrie</span>
                                <span className="bubble">Louange</span>
                            </div>
                            <div className="data__table__cell w-2/12">Glorious</div>
                            <div className="data__table__cell flex-1">
                                <span className="action">View</span>
                                <span className="action">Edit</span>
                                <span className="action">Delete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
