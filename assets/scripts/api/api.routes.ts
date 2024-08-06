
const API_ROUTES: {[k:string]: {[k: string]: string}} = {
    session: {
        currentUser: '/users/current',
    },
    score: {
        all: '/scores',
    }
}

export default API_ROUTES;
