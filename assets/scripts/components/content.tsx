import {ReactNode} from "react";

type ContentProps = {
    children: ReactNode;
}
export default function Content({children}: ContentProps) {
    return (
        <>
            <div className="content flex-1 min-h-screen">
                <div className="w-full content__header p-5 shadow bg-white">
                    <div className="content__search w-full relative flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                             stroke="currentColor"
                             className="w-5 h-5 cursor-pointer">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                        <input type="text" placeholder="Search..."
                               className="p-3 leading-6 bg-inherit focus:outline-none w-full"/>
                    </div>
                </div>

                <main className="w-full p-8">
                    {children}
                </main>
            </div>

        </>
    )

}
