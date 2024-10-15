import { Translate } from "react-i18nify";
import useIntersectionObserver from "../../core/hooks/useIntersectionObserver"
import React from "react";

type Props = {
    height: number;
}

let content: HTMLDivElement | null;
let start: number | null;
let height: number | null;

const handleScroll = () => {
    console.log('here')
    if (!start || !content) return;
    console.log('and here')
    
    const progress = window.scrollY - start;
    content.animate({ transform: `translateX(${getX(progress)}%)` }, { easing: `easeInOut` });
    console.log(`height: ${height},
        progress: ${progress},
        start: ${start},
        `)
}

const getX = (progress: number): number => {
    if (!height) return 0;
    const x = progress * 100 / height;
    return x;
}

export default function (props: Props) {
    const { isIntersecting, ref } = useIntersectionObserver<HTMLDivElement>({ rootMargin: `0px 0px -${window.innerHeight - 1}px 0px` });


    React.useEffect(() => {
        console.log(isIntersecting);
        if (!ref.current || !isIntersecting) return;
        height = props.height;
        start = window.scrollY;

        window.addEventListener('scroll', handleScroll);

        if (!content) content = ref.current.querySelector<HTMLDivElement>('#scroll-slide-content');
    }, [isIntersecting, ref]);

    return <div className="scroll-slide-container" ref={ref} style={{ height: props.height }}>
        <div className={`scroll-slide-content ${isIntersecting && 'active'}`}>
            <div>
                <Translate value="about_1" /> <br />
            </div>
            <div>
                <Translate value="about_2" /> <br />
            </div>
            <div>
                <Translate value="about_3" /> <strong><Translate value="programming" /></strong> <Translate value="about_4" /><br />
            </div>
            <div>
                <Translate value="about_5" /> <strong><Translate value="about_6" /></strong> <Translate value="about_7" /> <br />
            </div>
            <div>
                <Translate value="about_8" />
            </div>
        </div>
    </div>
}