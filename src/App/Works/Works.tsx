import React from "react";
import Section from "../../partials/Section/Section";
import { work } from "../../core/config/links/pages";
import linkId from "../../core/helpers/linkId";
import SectionTitle from "../../partials/SectionTitle/SectionTitle";
import Projects from "../../partials/Projects/Projects";

const Works = React.memo(() => {
    return <Section id={linkId(work)} className="d-flex flex-column gap-5 col-12" selfProps={{className: "works-container"}}>
        <SectionTitle>
            Recent works and Projects
        </SectionTitle>
        <Projects />
    </Section>
});

export default Works;