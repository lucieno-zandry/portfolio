import React from "react";
import ProjectItem from "../ProjectItem/ProjectItem";
import maboo from "./options/images/maboo.png";
import moneytoring from "./options/images/moneytoring.jpeg";
import { motion } from 'framer-motion';
import budgetmanager from "./options/images/budgetmanager.jpeg";
import { axios, bootstrap, css, express, framerMotion, html, laravel, mysql, php, react, redux, scss, typescript } from "../../core/config/technologies/technologies";
import { Project } from "../../core/config/types/variables";
import { GITHUB_BASE_URL } from "../../core/config/constants/constants";

const projects: Project[] = [
    {
        title: "Moneytoring",
        description: "A new, more mature version of the previous budgetmanager app",
        image: moneytoring,
        technologies: [
            html,
            css,
            react,
            framerMotion,
            scss,
            bootstrap,
            typescript,
            express,
            mysql
        ],
        links: {
            github: `${GITHUB_BASE_URL}/moneytoring`,
            web: 'https://moneytoring.rf.gd'
        }
    },
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
            github: `${GITHUB_BASE_URL}/moneytoring`,
            web: 'https://budgetmanager.000.pe'
        }
    },
]

const Projects = React.memo(() => {
    return <motion.div className="d-flex gap-5 projects py-3">
        {projects.map((project, key) => <ProjectItem key={key} {...project} />)}
    </motion.div>
})

export default Projects;