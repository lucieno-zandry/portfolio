import { about } from "../../core/config/links/pages";
import linkId from "../../core/helpers/linkId";
import Section from "../../partials/Section/Section";
import SectionTitle from "../../partials/SectionTitle/SectionTitle";
import Stack from "../../partials/Stack/Stack";

const stacks = [
    {
        name: "Front-End",
        experience: "6+ months experience",
    },
    {
        name: "Back-End",
        experience: "6+ months experience",
    },
    {
        name: "Server",
        experience: "3+ months experience",
    },
];

const About = () => {
    return <Section
        className="about d-flex flex-column gap-3 "
        selfProps={{ className: 'bg-primary about-container justify-content-center' }}
        id={linkId(about)}>
        <SectionTitle variant="dark">About</SectionTitle>
        <p >
            A passionate full-stack web developer with a strong foundation in both frontend and backend technologies. <br />
            With 12 months of experience, I specialize in building dynamic, user-centric web applications and have a deep understanding of modern development practices and tools. <br />
            I hold a bachelor's degree in <strong>Programming</strong> and have honed my skills through various projects and professional experiences.<br />
            My expertise spans across <strong>PHP, Laravel, React, TypeScript, and SQL,</strong> allowing me to create seamless, high-performance applications. <br />
            Recently, I've been diving into Python and exploring its potential in AI and machine learning, expanding my horizons and embracing new challenges. </p>

        <p>
            I thrive on solving complex problems and delivering elegant, efficient solutions. <br />
            My commitment to writing clean, maintainable code and my enthusiasm for learning new technologies drive me to continuously improve and stay ahead in this ever-evolving field.<br />
        </p>
        <div className="d-flex justify-content-around flex-wrap stacks">
            {stacks.map((stack, key) => {
                const hrefId = key + 1;
                const href = `#technologies${hrefId === 1 ? '' : hrefId}`
                return <Stack
                    href={href}
                    name={stack.name}
                    experience={stack.experience}
                    key={key} />
            })}
        </div>
    </Section>
}

export default About