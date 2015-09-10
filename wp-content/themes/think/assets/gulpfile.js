var gulp = require('gulp');
var postcss = require('gulp-postcss');
var nano = require('gulp-cssnano');

// PostCSS Plugins
var includes = require('postcss-import');
var mixins = require('postcss-mixins');
var forLoops = require('postcss-for');
var nested = require('postcss-nested');
var autoprefixer = require('autoprefixer-core');
var simpleVars = require('postcss-simple-vars');
var colorFunction = require('postcss-color-function');

gulp.task('compile', function() {
    var processors = [
        includes,
        mixins,
        forLoops,
        nested,
        autoprefixer({browsers: ['last 3 version']}),
        simpleVars,
        colorFunction
    ];
    return gulp.src('./post/*.css')
        .pipe(postcss(processors))
        .pipe(gulp.dest('./css'));
});

gulp.task('nano', ['compile'], function () {
    return gulp.src('./css/*.css')
        .pipe(nano())
        .pipe(gulp.dest('./css'));
});

gulp.task('watch', function() {
    gulp.watch('./post/*.css', ['compile', 'nano']);
    gulp.watch('./post/*/*.css', ['compile', 'nano']);
});

gulp.task('default', ['watch']);
