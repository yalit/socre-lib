import {User, userSchema} from "../../interfaces/session/user.interface";
import apiRouter from "../../api/api.router";
import apiFetch from "../../api/api.fetcher";

const UserRepository = {
    getCurrentUser: async (): Promise<User> => {
        const userData = await apiFetch(apiRouter.generate('session', 'currentUser'));
        return userSchema.cast(userData)
    }
}

export default UserRepository;
