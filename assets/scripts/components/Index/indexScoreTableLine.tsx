import {Score} from "../../interfaces/score/score.interface";
import {classNames} from "../../libraries/dom";

type IndexScoreTableLineProps = {
    score: Score | null;
    odd?: boolean;
};
export default function IndexScoreTableLine({score, odd = false}: IndexScoreTableLineProps) {
    const classes = classNames('data__table__line', odd ? 'odd' : '');
    return (
        <div className={classes}>
            {score ? (
                <>
                    <div className="data__table__cell w-3/12 lg:w-2/12">{score.title}</div>
                    <div className="data__table__cell w-2/12 ">
                        {score.refs.map((ref, k) => (
                            <span className="bubble" key={k}>{ref.value}</span>
                        ))}
                    </div>
                    <div className="data__table__cell w-3/12 ">
                        {score.categories.map((category, k) => (
                            <span className="bubble" key={k}>{category.value}</span>
                        ))}
                    </div>
                    <div className="data__table__cell w-3/12">
                        {score.artists.map((artist, k) => (
                            <span className="bubble" key={k}>{artist.name}</span>
                        ))}
                    </div>
                    <div className="data__table__cell flex-1 justify-end">
                        <span className="action">View</span>
                        <span className="action">Edit</span>
                        <span className="action">Delete</span>
                    </div>
                </>
            ) : "Loading..."}
        </div>
    )
}
