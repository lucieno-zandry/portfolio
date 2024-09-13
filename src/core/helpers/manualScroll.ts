import { scrollContainer } from "../config/links/pages";

let timeout: number | null;

export default (target: string) => {
    const container: HTMLDivElement | null = document.querySelector(scrollContainer);
    const targetElement: HTMLDivElement | null = document.querySelector(target);

    if (!container || !targetElement) return;

    container.style.scrollSnapType = 'none';
    targetElement.scrollIntoView({ behavior: "smooth" });
    if (timeout) return;

    timeout = setTimeout(() => {
        container.style.scrollSnapType = 'y mandatory';
        timeout = null;
    }, 1000);
}