import { translate, Translate } from "react-i18nify";
import { about } from "../../core/config/links/pages";
import linkId from "../../core/helpers/linkId";
import Section from "../../partials/Section/Section";
import SectionTitle from "../../partials/SectionTitle/SectionTitle";
import Stack from "../../partials/Stack/Stack";

const stacks = [
    {
        name: "Front-End",
        experience: translate('experience_6'),
    },
    {
        name: "Back-End",
        experience: translate('experience_6'),
    },
    {
        name: "Server",
        experience: translate("experience_3"),
    },
];

const About = () => {
    return <Section
        className="about d-flex flex-column gap-3"
        selfProps={{ className: 'bg-primary about-container justify-content-center' }}
        id={linkId(about)}>
        <SectionTitle variant="dark"><Translate value="about" /></SectionTitle>
        <p >
            <Translate value="about_1" /> <br />
            <Translate value="about_2" /> <br />
            <Translate value="about_3" /> <strong><Translate value="programming" /></strong> <Translate value="about_4" /><br />
            <Translate value="about_5" /> <strong><Translate value="about_6" /></strong> <Translate value="about_7" /> <br />
            <Translate value="about_8" /></p>

        <p>
            <Translate value="about_9" /> <br />
            <Translate value="about_10" /><br />
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