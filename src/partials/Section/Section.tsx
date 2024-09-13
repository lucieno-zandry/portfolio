import React from "react";
import { useNavbar } from "../../App/options/hooks";
import useIntersectionObserver from "../../core/hooks/useIntersectionObserver";
import { themes } from "../../App/App";
import theme from "../../core/helpers/theme";
import { HTMLMotionProps, motion, Variants } from 'framer-motion';


interface SectionProps extends HTMLMotionProps<'div'> {
    selfProps?: React.HTMLAttributes<HTMLDivElement>,
    intersectionObserverOptions?: IntersectionObserverInit,
}

const defaultIntersectionObserverOptions: IntersectionObserverInit = {
    threshold: .8,
    rootMargin: '10%',
}

const variants: Variants = {
    hidden: {
        opacity: 0,
    },
    visible: {
        opacity: 1,
        transition: {
            delay: .5,
            when: 'beforeChildren',
            duration: 1,
            type: 'tween'
        }
    }
}

const Section = React.memo((props: SectionProps) => {
    const { id, selfProps = {}, intersectionObserverOptions, ...divProps } = props;
    const { active, setActive } = useNavbar();
    const { className = '', ...rest } = selfProps;

    const { ref, isIntersecting } = useIntersectionObserver<HTMLDivElement>(intersectionObserverOptions || defaultIntersectionObserverOptions);

    React.useEffect(() => {
        if (!id) return;

        if (isIntersecting && active !== id) {
            setActive(id);
        }

    }, [isIntersecting, active, id]);

    return (
        <div
            className={`section d-flex px-2 px-md-5 ${className} ${theme(id as keyof typeof themes)}`}
            ref={ref}
            id={id}
            {...rest}>
            <motion.div variants={variants}
                initial="hidden"
                whileInView="visible"
                {...divProps} />
        </div>
    );
});

export default Section;
