import React, { PropsWithChildren } from "react";
import { home } from "../../core/config/links/pages";
import { AppContext, ComponentsContext } from "./contexts";
import linkId from "../../core/helpers/linkId";
import ProjectModal, { defaultProjectModalRef } from "../../partials/ProjectModal/ProjectModal";

const AppContextProvider = React.memo((props: PropsWithChildren) => {
  const [state, setState] = React.useState({
    navbar: {
      active: linkId(home),
    },
  });

  const { navbar } = state;

  const value = React.useMemo(
    () => ({
      navbar: {
        active: navbar.active,
        setActive: (pathname: string) => {
          setState((s) => ({
            ...s,
            navbar: { ...s.navbar, active: pathname },
          }));
        },
      },
    }),
    [navbar.active]
  );

  return (
    <AppContext.Provider value={value}>{props.children}</AppContext.Provider>
  );
});

export const ComponentsContextProvider = React.memo((props: PropsWithChildren) => {

  const projectModalRef = React.useRef(defaultProjectModalRef);

  const contextValue = React.useMemo(() => ({
    projectModalRef,
  }), [projectModalRef]);

  return <ComponentsContext.Provider value={contextValue}>
    <ProjectModal />
    {props.children}
  </ComponentsContext.Provider>
})

export default AppContextProvider;