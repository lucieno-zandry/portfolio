import { setLocale } from "react-i18nify";
import { create } from "zustand";

export const LANGUAGES = {
  fr: "Français",
  en: "English",
};

export type Language = keyof typeof LANGUAGES;

type LanguageStore = {
  language: Language;
  setLanguage: (language: LanguageStore["language"]) => void;
};

export default create<LanguageStore>((set) => ({
  language: "en",
  setLanguage: (language) => {
    setLocale(language);
    set((s) => ({ ...s, language }));
  },
}));
