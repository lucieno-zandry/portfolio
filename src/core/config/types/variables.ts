export type Technology = {
    logo: string,
    name: string,
}

export type Project = {
    image: string,
    title: string,
    description: string,
    technologies : Technology[],
    links: {
        github: string,
        web: string,
    },
}
