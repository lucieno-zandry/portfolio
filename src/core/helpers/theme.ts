import { themes } from "../../App/App";

export default function (themeKey?: keyof typeof themes) {
  if (!themeKey || !themes[themeKey]) return "bg-dark";
  return `bg-${themes[themeKey]}`;
}
