import create from 'zustand';
import {User} from "../../interfaces/session/user.interface";

type UserState = {
    user: User|null;
    setUser: (user: User) => void;
}

const useUserStore = create<UserState>((set) => ({
    user: null,
    setUser: (user: User) => set({ user }),
}));

export default useUserStore;
