var gulp = require('gulp');
var concat = require('gulp-concat');
var concatCss = require('gulp-concat-css');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var gzip = require('gulp-gzip');
var destination = './public/';

var assets = {
    images: [
        './resources/assets/images/*'
    ],
    fonts: [
        './resources/assets/fontello/font/*'
    ],
    styles: [
        './node_modules/bootstrap/dist/css/bootstrap.css',
        './resources/assets/fontello/css/fontello.css',
        './resources/assets/fontello/css/animation.css',
        './resources/assets/css/app.css'
    ],
    scripts: [
        './node_modules/jquery/dist/jquery.js',
        './node_modules/tether/dist/js/tether.js',
        './node_modules/bootstrap/dist/js/bootstrap.js',
        './resources/assets/js/app.js'
    ]
};

gulp.task('default', ['images', 'fonts', 'styles', 'scripts']);

gulp.task('images', function () {
    return gulp.src(assets.images)
        .pipe(gulp.dest(destination + 'images/'));
});

gulp.task('fonts', function () {
    return gulp.src(assets.fonts)
        .pipe(gulp.dest(destination + 'font/'))
        .pipe(gzip())
        .pipe(gulp.dest(destination + 'font/'));
});

gulp.task('styles', function () {
    return gulp.src(assets.styles)
        .pipe(concatCss('app.min.css', {rebaseUrls:false}))
        .pipe(cleanCSS())
        .pipe(gulp.dest(destination + 'css/'))
        .pipe(gzip())
        .pipe(gulp.dest(destination + 'css/'));
});

gulp.task('scripts', function() {
    return gulp.src(assets.scripts)
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(destination + 'js/'))
        .pipe(gzip())
        .pipe(gulp.dest(destination + 'js/'));
});
