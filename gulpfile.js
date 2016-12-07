var gulp        = require('gulp');
var concat      = require('gulp-concat');
var rename      = require('gulp-rename');
var uglify      = require('gulp-uglify');
var sass        = require('gulp-sass');
var cleanCss    = require('gulp-clean-css');

paths = {
    dist: {
        fonts: ['./node_modules/admin-lte/bootstrap/fonts/*'],
        img: ['./node_modules/admin-lte/dist/img/*/*'],
        css: [
            './node_modules/admin-lte/bootstrap/css/bootstrap.min.css',
            './node_modules/admin-lte/plugins/iCheck/square/blue.png',
            './node_modules/admin-lte/plugins/iCheck/square/blue@2x.png'

        ]
    },
    css: [
        './node_modules/admin-lte/plugins/select2/select2.css',
        './node_modules/admin-lte/dist/css/AdminLTE.css',
        './node_modules/admin-lte/dist/css/skins/skin-black.css',
        './node_modules/admin-lte/plugins/iCheck/square/blue.css',
        './node_modules/dropzone/dist/dropzone.css'
    ],
    js: [
        './node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js',
        './node_modules/admin-lte/bootstrap/js/bootstrap.js',
        './node_modules/admin-lte/plugins/datepicker/bootstrap-datepicker.js',
        './node_modules/admin-lte/plugins/select2/select2.full.js',
        './node_modules/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js',
        './node_modules/admin-lte/plugins/fastclick/fastclick.js',
        './node_modules/admin-lte/plugins/iCheck/icheck.js',
        './node_modules/admin-lte/dist/js/app.min.js',
        './node_modules/dropzone/dist/dropzone.js'
    ]
};


gulp.task('bootstrap', function(){
    gulp.src(paths.dist.css).pipe(gulp.dest('./src/Resources/public/css/'));
    gulp.src(paths.dist.fonts).pipe(gulp.dest('./src/Resources/public/fonts/'));
    gulp.src(paths.dist.img).pipe(gulp.dest('./src/Resources/public/img/'));
});

gulp.task('scripts', function () {
    return gulp.src(paths.js)
        .pipe(concat('admin-lte.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./src/Resources/public/js/'))
        ;
});

gulp.task('css', function () {
    gulp.src(paths.css)
        .pipe(cleanCss())
        .pipe(concat('admin-lte.min.css'))
        .pipe(gulp.dest('./src/Resources/public/css/'))
    ;
});

gulp.task('default', ['bootstrap', 'scripts', 'css']);
