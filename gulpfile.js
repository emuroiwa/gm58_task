
let gulp = require('gulp');
// let cleanCSS = require('gulp-clean-css');
// let sourcemaps = require('gulp-sourcemaps');
 
gulp.task('default',() => {
  return gulp.src('public/dist/css/adminlte.css')
    
    .pipe(gulp.dest('public/dist/css/'));
});