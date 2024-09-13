import React from "react";
import ProjectItem from "../ProjectItem/ProjectItem";
import maboo from "./options/images/maboo.png";
import portfolio from "./options/images/portfolio.jpeg";
import { motion } from 'framer-motion';
import budgetmanager from "./options/images/budgetmanager.jpeg";
import { axios, bootstrap, css, framerMotion, html, laravel, mysql, php, react, redux, scss, typescript } from "../../core/config/technologies/technologies";
import { Project } from "../../core/config/types/variables";
import { GITHUB_BASE_URL } from "../../core/config/constants/constants";

const projects: Project[] = [
    {
        title: "Maboo",
        description: "E-commerce app dedicated for recent parents",
        image: maboo,
        technologies: [
            html,
            css,
            react,
            framerMotion,
            redux,
            scss,
            bootstrap,
            typescript,
            axios,
            php,
            mysql,
            laravel,
        ],
        links: {
            github: `${GITHUB_BASE_URL}/maboo`,
            web: 'https://maboo.mg'
        }
    },
    {
        title: "Budgetmanager",
        description: "A solution for managing personnal expenses",
        image: budgetmanager,
        technologies: [
            html,
            css,
            react,
            framerMotion,
            scss,
            bootstrap,
            typescript,
            axios,
            php,
            mysql,
            laravel,
        ],
        links: {
            github: `${GITHUB_BASE_URL}/budgetmanager-frontend2.0`,
            web: 'https://budgetmanager.000.pe'
        }
    },
    {
        title: "Portfolio",
        description: "About myself and parts of my most recent achievements",
        image: portfolio,
        technologies: [
            html,
            css,
            react,
            framerMotion,
            redux,
            scss,
            bootstrap,
            typescript,
        ],
        links: {
            github: `${GITHUB_BASE_URL}/portfolio`,
            web: 'https://lucienozandry.rf.gd'
        }
    },
]

const Projects = React.memo(() => {
    return <motion.div className="d-flex gap-5 projects py-3">
        {projects.map((project, key) => <ProjectItem key={key} {...project} />)}
    </motion.div>
})

export default Projects;