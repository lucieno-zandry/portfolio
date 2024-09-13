import React from "react";
import { home } from "../../core/config/links/pages";
import linkId from "../../core/helpers/linkId";
import { defaultProjectModalRef } from "../../partials/ProjectModal/ProjectModal";

export const AppContext = React.createContext({
  navbar: {
    active: linkId(home),
    setActive: (pathname: string) => {
      pathname;
    },
  },
});

export const ComponentsContext = React.createContext({
  projectModalRef: { current: defaultProjectModalRef },
});
