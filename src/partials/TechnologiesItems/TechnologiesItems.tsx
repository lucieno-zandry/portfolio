import React from "react";
import TechnologyItem from "../TechnologyItem/TechnologyItem";
import { Technology } from "../../core/config/types/variables";


type Props = {
    technologies: Technology[]
}

const TechnologiesItems = React.memo((props: Props) => {
    const { technologies } = props;

    return <div className="technologies-items d-flex gap-5 justify-content-center flex-wrap">
        {technologies.map((technology, key) => <TechnologyItem key={key} uniqueKey={key} {...technology} />)}
    </div>
});

export default TechnologiesItems;