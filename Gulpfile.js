var gulp = require('gulp');
var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');
var uglifycss = require('gulp-uglifycss');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var debug = require('gulp-debug');
var order = require('gulp-order');
var merge = require('merge-stream');
var gutil = require('gulp-util');

var env = gutil.env.env;
var rootPath = 'web/assets/';
var adminRootPath = rootPath + 'admin/';
var webRootPath = rootPath + 'web/';

var paths = {
    admin: {
        js: [
            'node_modules/tether/dist/js/tether.min.js',
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'web/ui/admin/js/**',
            'web/ui/admin/app.js'
        ],
        sass: [
            'web/ui/admin/sass/**'
        ],
        css: [
            'node_modules/font-awesome/css/font-awesome.min.css',
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/tether/dist/css/tether.min.css',
            'web/ui/admin/css/**'
        ],
        img: [
            'vendor/sylius/ui-bundle/Resources/private/img/**',
            'web/ui/admin/img/**'
        ],
        fonts: [
            'node_modules/font-awesome/fonts/**'
        ],
        copy: [
            ['tinymce', 'node_modules/tinymce/**']
        ]
    },
    web: {
        js: [
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/tether/dist/js/tether.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/jquery-lazyload/jquery.lazyload.js',
            'node_modules/pace-progress/pace.min.js',
            'node_modules/lightbox2/dist/js/lightbox.min.js',
            'node_modules/lightslider/dist/js/lightslider.js',
            'web/ui/web/js/**',
            'web/ui/web/app.js'
        ],
        sass: [
            'web/ui/web/sass/**'
        ],
        css: [
            'node_modules/font-awesome/css/font-awesome.min.css',
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/pace-progress/themes/silver/pace-theme-loading-bar.css',
            'node_modules/lightbox2/dist/css/lightbox.min.css',
            'node_modules/lightslider/dist/css/lightslider.min.css',
            'web/ui/web/css/**'
        ],
        images:[
            'web/ui/web/images/**'
        ],
        img: [
            'web/ui/web/img/**'
        ],
        fonts: [
            'node_modules/font-awesome/fonts/**',
            'web/ui/web/fonts/**'
        ],
        copy: [
            ['modernizr', 'node_modules/modernizr/src/**']
        ]
    }
};

// ADMIN
gulp.task('admin-js', function() {
    return gulp.src(paths.admin.js)
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(adminRootPath + 'js/'));
});

gulp.task('admin-css', function() {

    var cssStream = gulp.src(paths.admin.css)
        .pipe(concat('css-files.css'));

    var sassStream = gulp.src(paths.admin.sass)
        .pipe(sass())
        .pipe(concat('sass-files.scss'));

    return merge(cssStream, sassStream)
        .pipe(order(['css-files.css', 'sass-files.scss']))
        .pipe(concat('style.css'))
        .pipe(uglifycss())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(adminRootPath + 'css/'))
    ;
});

gulp.task('admin-img', function() {
    return gulp.src(paths.admin.img)
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(adminRootPath + 'img/'));
});

gulp.task('admin-fonts', function() {
    return gulp.src(paths.admin.fonts)
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(adminRootPath + 'fonts/'));
});

gulp.task('admin-copy', function() {
    gulp.src(paths.admin.fonts)
        .pipe(gulp.dest(adminRootPath + 'fonts/'))
    ;

    gulp.src(paths.admin.img)
        .pipe(gulp.dest(adminRootPath + 'img/'))
    ;

    for (var i = 0; i < paths.admin.copy.length; i++) {
        var copy = paths.admin.copy[i];
        if (typeof copy === "object") {
            gulp.src(copy[1]).pipe(gulp.dest(adminRootPath + '/' + copy[0]));
        } else {
            gulp.src(copy).pipe(gulp.dest(adminRootPath))
        }
    }
});

gulp.task('admin-watch', function() {
    gulp.watch(paths.admin.js, ['admin-js']);
    gulp.watch(paths.admin.coffee, ['admin-js']);
    gulp.watch(paths.admin.sass, ['admin-css']);
    gulp.watch(paths.admin.css, ['admin-css']);
    gulp.watch(paths.admin.img, ['admin-img']);
    gulp.watch(paths.admin.fonts, ['admin-fonts']);
});

// WEB
gulp.task('web-js', function() {
    return gulp.src(paths.web.js)
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(webRootPath + 'js/'));
});

gulp.task('web-css', function() {
    var cssStream = gulp.src(paths.web.css)
        .pipe(concat('css-files.css'));

    var sassStream = gulp.src(paths.web.sass)
        .pipe(sass())
        .pipe(concat('sass-files.scss'));

    return merge(cssStream, sassStream)
        .pipe(order(['css-files.css', 'sass-files.scss']))
        .pipe(concat('style.css'))
        .pipe(uglifycss())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(webRootPath + 'css/'))
    ;
});

gulp.task('web-img', function() {
    return gulp.src(paths.web.img)
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(webRootPath + 'img/'));
});

gulp.task('web-images', function() {
    return gulp.src(paths.web.images)
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(webRootPath + 'images/'));
});

gulp.task('web-fonts', function() {
    return gulp.src(paths.web.fonts)
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(webRootPath + 'fonts/'));
});

gulp.task('web-watch', function() {
    gulp.watch(paths.web.js, ['web-js']);
    gulp.watch(paths.web.coffee, ['web-js']);
    gulp.watch(paths.web.sass, ['web-css']);
    gulp.watch(paths.web.css, ['web-css']);
    gulp.watch(paths.web.img, ['web-img']);
    gulp.watch(paths.web.img, ['web-images']);
    gulp.watch(paths.web.fonts, ['web-fonts']);
});

gulp.task('admin', ['admin-watch', 'admin-js', 'admin-css', 'admin-img', 'admin-fonts', 'admin-copy']);
gulp.task('web', ['web-watch', 'web-js', 'web-css', 'web-img','web-images', 'web-fonts']);

gulp.task('default', [
    'admin-watch', 'admin-js', 'admin-css', 'admin-img', 'admin-fonts', 'admin-copy',
    'web-watch', 'web-js', 'web-css', 'web-img','web-images', 'web-fonts'
]);
