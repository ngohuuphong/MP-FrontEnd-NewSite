var gulp = require('gulp');
var sass = require('gulp-sass');
var livereload = require('gulp-livereload');
var minify = require('gulp-minify');
var minifyCss = require('gulp-minify-css');

gulp.task('sass', function () {
    return gulp.src('assets/sass/particle/*')
        .pipe(sass())
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(gulp.dest('assets/css/particle/'))
        .pipe(livereload());
});

// Watch Files For Changes
gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('assets/sass/particle/*', gulp.series('sass'));
});