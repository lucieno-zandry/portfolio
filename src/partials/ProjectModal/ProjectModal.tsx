import React from "react";
import { createPortal } from "react-dom";
import TechnologyItem from "../TechnologyItem/TechnologyItem";
import { Project } from "../../core/config/types/variables";
import Icon from "../Icon/Icon";
import { ComponentsContext } from "../../App/options/contexts";
import { AnimatePresence, motion } from "framer-motion";

interface Target extends EventTarget {
    id: string,
}

export type ProjectModalRef = { project: Project | null, setProject: (project: Project | null, onClose?: Function) => void }

export const defaultProjectModalRef: ProjectModalRef = {
    project: null,
    setProject: (project: Project | null, onClose?: Function) => { project; onClose && onClose(); }
}

const containerId = 'project-modal';

const containerVariants = {
    hidden: { opacity: 0 },
    visible: {
        opacity: 1,
        transition: {
            type: "spring"
        }
    }
}

const ProjectModal = React.memo(() => {

    const [state, setState] = React.useState({
        project: null as Project | null,
        onClose: null as Function | null,
    });

    const { project, onClose } = state;

    const { projectModalRef } = React.useContext(ComponentsContext);

    projectModalRef.current = {
        project,
        setProject: (project: Project | null, onClose: Function | null = null) => setState(s => ({ ...s, project, onClose }))
    }

    const show = React.useMemo(() => Boolean(state.project), [state.project]);
    const showClassName = React.useMemo(() => show ? 'show' : '', [show]);

    const closeModal = React.useCallback(() => {
        onClose && onClose();
        setState(s => ({ ...s, project: null, onClose: null }));
    }, [onClose]);

    const handleClose: React.MouseEventHandler<HTMLDivElement> = React.useCallback((e) => {
        const target = e.target as Target;

        if (target.id === containerId) {
            closeModal();
        }
    }, [closeModal]);

    const keyupListener = React.useCallback((e: KeyboardEvent) => {
        const { key } = e;

        const closeKeys = [
            'Escape',
        ]

        if (closeKeys.includes(key)) {
            closeModal();
        }
    }, [closeModal]);


    React.useEffect(() => {
        if (show) {
            window.addEventListener('keyup', keyupListener);
        }

        return () => {
            window.removeEventListener('keyup', keyupListener);
        }
    }, [show, keyupListener]);

    const children = React.useMemo(() => {
        return <AnimatePresence>
            {project && <motion.div
                className={`project-modal ${showClassName}`}
                onClick={handleClose}
                id={containerId}
                tabIndex={-1}
                variants={containerVariants}
                initial="hidden"
                animate="visible"
                exit="hidden">
                <div className="project-modal-content d-flex justify-content-between flex-wrap flex-sm-nowrap gap-5 align-items-center p-3 p-sm-5 rounded">
                    <motion.img
                        src={project.image}
                        alt={project.description}
                        layoutId={project.title}
                        className="project-modal-image img-responsive col-12 col-sm-6" />

                    <div className="d-flex flex-column gap-3 col-12 col-sm-6">
                        <div>
                            <h3 className="display-6 text-primary">{project.title}</h3>
                            <p className="m-0">{project.description}</p>
                        </div>
                        <div>
                            <h5 className="">Technologies</h5>
                            <div className="d-flex gap-2 flex-wrap">
                                {project.technologies.map((technology, key) => <TechnologyItem
                                    key={key}
                                    uniqueKey={key}
                                    withName={false}
                                    {...technology} />)}
                            </div>
                        </div>
                        <div>
                            <h5>Open on</h5>
                            <div className="d-flex gap-2">
                                <a className="btn btn-dark d-flex align-items-center gap-2" href={project.links.github}>
                                    <Icon variant="github" type="brands" size={2} /> Github
                                </a>
                                <a className="btn btn-outline-primary d-flex align-items-center gap-2" href={project.links.web}>
                                    <Icon variant="globe" size={2} /> Web
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </motion.div>}
        </AnimatePresence>
    }, [project, showClassName]);

    return createPortal(children, document.body);
});

export default ProjectModal;