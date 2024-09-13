import React from "react";
import { AnimatePresence, motion } from 'framer-motion';
import { Project } from "../../core/config/types/variables";
import { useProjectModal } from "../../App/options/hooks";

const imageVariants = {
    hidden: {
        opacity: 0,
    },
    visible: {
        opacity: 1,
    }
}

const ProjectItem = React.memo((props: Project) => {
    const { image, description, title } = props;

    const { setProject } = useProjectModal();

    const [visible, setVisible] = React.useState(true);

    const handleClick = React.useCallback(() => {
        setVisible(false);
        setProject(props, () => setVisible(true));
    }, [setProject]);

    return <motion.div className="project-item">
        <AnimatePresence>
            {visible &&
                <motion.img
                    src={image}
                    className="mb-3"
                    onClick={handleClick}
                    layoutId={title}
                    variants={imageVariants}
                    initial="hidden"
                    animate="visible"
                    exit="hidden" />}
        </AnimatePresence>

        <h3 className="m-0">{title}</h3>
        <p className="text-primary m-0">{description}</p>
    </motion.div>
})

export default ProjectItem;