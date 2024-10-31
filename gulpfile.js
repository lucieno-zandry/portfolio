const { dest, src, watch, series } = require("gulp"); 
const gulpSass = require("gulp-sass");
const scss = require("sass");
const purgeCss = require("gulp-purgecss");

const sass = gulpSass(scss);

function buildStyles() {
  return src("style.scss")
    .pipe(sass())
    .pipe(purgeCss({ content: ["*.php", "**/*.php"] }))
    .pipe(dest("./"));
}

function watchTask() {
  watch(["**/*.scss", "*.scss", "*.php", "**/*.php"], buildStyles);
}

// Export the tasks properly to avoid async issues
exports.buildStyles = buildStyles;
exports.default = series(buildStyles, watchTask);
