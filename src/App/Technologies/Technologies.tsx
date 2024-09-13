import React from "react";
import Section from "../../partials/Section/Section";
import SectionTitle from "../../partials/SectionTitle/SectionTitle";
import linkId from "../../core/helpers/linkId";
import { technologies, technologies2, technologies3 } from "../../core/config/links/pages";
import TechnologiesItems from "../../partials/TechnologiesItems/TechnologiesItems";
import { axios, bootstrap, css, docker, framerMotion, git, github, html, javascript, laravel, mysql, php, ratchetWebsocket, react, redux, scss, ssh, typescript, ubuntu } from "../../core/config/technologies/technologies";


const frontTechnologies = [
    html,
    css,
    javascript,
    scss,
    typescript,
    react,
    bootstrap,
    redux,
    framerMotion,
    axios,
]

const backTechnologies = [
    php,
    laravel,
    mysql,
    ratchetWebsocket
]

const serverTechnologies = [
    docker,
    git,
    github,
    ssh,
    ubuntu,
]

const Technologies = React.memo(() => {
    return <>
        <Section
            id={linkId(technologies)}
            className="col-12"
            selfProps={{ className: "technologies-container-1" }}
            intersectionObserverOptions={{ threshold: .3, rootMargin: '5%' }}>
            <SectionTitle variant="dark">Technologies</SectionTitle>
            <h3 className="mb-5 mx-5 mt-2 text-dark">Frontend</h3>
            <TechnologiesItems technologies={frontTechnologies} />
        </Section>
        <Section className="col-12" id={linkId(technologies2)} selfProps={{ className: "technologies-container-2" }}>
            <SectionTitle>Technologies</SectionTitle>
            <h3 className="mb-5 mx-5 mt-2 text-dark">Backend</h3>
            <TechnologiesItems technologies={backTechnologies} />
        </Section>
        <Section
            id={linkId(technologies3)}
            className="col-12"
            selfProps={{ className: "technologies-container-3" }}
            intersectionObserverOptions={{rootMargin: '10%', threshold: .3}}>
            <SectionTitle variant="dark">Technologies</SectionTitle>
            <h3 className="mb-5 mx-5 mt-2">Server and Others</h3>
            <TechnologiesItems technologies={serverTechnologies} />
        </Section>
    </>
});

export default Technologies;