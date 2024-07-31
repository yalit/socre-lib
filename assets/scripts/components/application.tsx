import Layout from "./layout";
import useUserStore from "../state/sesssion/store";
import UserRepository from "../repository/session/user.repository";
import {useQuery} from "react-query";

export default function Application({children}) {
    const {setUser} = useUserStore();

    const { data: user, isError, isLoading } = useQuery(
        'user',
        UserRepository.getCurrentUser,
        {
            onSuccess: (user) => {
                setUser(user);
            },
        }
    );

    return (
        <Layout>
            {children}
        </Layout>
    );
}
