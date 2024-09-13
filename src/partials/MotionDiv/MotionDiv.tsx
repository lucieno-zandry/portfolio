import { AnimatePresence, motion } from "framer-motion";
import React from "react";

export type MotionDivProps = {
    children: any,
    show: boolean,
    className?: string,
    id?: string,
    layout?: boolean,
    onBlur?: () => void,
    onClick?: () => void,
};

const variants = {
    visible: {
        opacity: 1,
        transition: { delay: .3, duration: 1 }
    },
    hidden: {
        opacity: 0
    }
}

const MotionDiv = React.forwardRef((props: MotionDivProps, ref?: React.LegacyRef<HTMLDivElement>) => {
    const { show, ...divProps } = props;

    return <AnimatePresence>
        {show &&
            <motion.div
                variants={variants}
                initial="hidden"
                animate="visible"
                exit="hidden"
                {...divProps}
                ref={ref} />}
    </AnimatePresence>
});

export default MotionDiv;