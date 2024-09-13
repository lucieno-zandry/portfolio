import React from "react";
import { AppContext, ComponentsContext } from "./contexts";

export const useNavbar = () => {
  return React.useContext(AppContext).navbar;
};

export const useProjectModal = () => {
  return React.useContext(ComponentsContext).projectModalRef.current;
}
