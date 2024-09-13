import React from "react";
import { motion, Variants } from 'framer-motion';
import { Technology } from "../../core/config/types/variables";

interface Props extends Technology {
    uniqueKey: number,
    withName?: boolean,
}

const delay = .2;

const titleVariants: Variants = {
    hidden: {
        opacity: 0,
    },
    visible: {
        opacity: 1,
        transition: {
            duration: 1,
            type: 'tween',
        }
    }
}

const TechnologyItem = React.memo((props: Props) => {
    const { name, logo, uniqueKey, withName = true } = props;

    const variants: Variants = React.useMemo(() => ({
        hidden: {
            scale: 0,
            rotate: 90
        },
        visible: {
            scale: 1,
            rotate: 0,
            transition: {
                type: 'spring',
                delay: uniqueKey * delay,
                when: 'beforeChildren'
            }
        }
    }), [uniqueKey]);


    return <motion.div
        className="technology-item d-flex flex-column align-items-center gap-2"
        variants={variants}
        initial="hidden"
        whileInView="visible">
        <img src={logo} className="rounded img-responsive" />
        {withName &&
            <motion.h4 className="text-dark" variants={titleVariants}>{name}</motion.h4>}
    </motion.div>
});

export default TechnologyItem;