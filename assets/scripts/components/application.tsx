import Sidebar from "./sidebar";
import Content from "./content";

export default function Application({children}) {
    return (
        <div className="w-full flex gap-0">
            <Sidebar/>
            <Content>{children}</Content>
        </div>
    );
}
