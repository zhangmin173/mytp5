var gulp = require('gulp'), // gulp打包工具
    less = require('gulp-less'), // less编译插件
    plumber = require('gulp-plumber'), // 报错并继续执行
    cssmin = require('gulp-clean-css'), // css压缩插件
    autoprefix = require('gulp-autoprefixer'), // css补全前缀
    uglify = require('gulp-uglify'), // js压缩插件
    rename = require('gulp-rename'), // 重命名
    concat = require("gulp-concat"); // 文件合并

var root = './public/index/v1/';

var path = {
    css: 'css/',
    less: 'less/',
    js: 'js/',
    lib: 'lib/'
};

// 合并所有js到all.js
gulp.task('concat', function () {
    gulp.src('js/*.js')
    .pipe(concat('all.js'))
    .pipe(gulp.dest('dist/js'));
});

// 编译less并压缩输出css
gulp.task('less', function() {
    return gulp.src(root + path.less +  '*.less')
        .pipe(less())
        .pipe(plumber())
        .pipe(autoprefix())
        .pipe(cssmin())
        .pipe(gulp.dest(root + path.css));
});

// 编译less并压缩输出css
gulp.task('lib-less', function() {
    return gulp.src(root + path.lib +  '**/*.less')
        .pipe(less())
        .pipe(plumber())
        .pipe(autoprefix())
        .pipe(cssmin())
        .pipe(gulp.dest(root + path.lib));
});

// 压缩js
gulp.task('js', function() {
    return gulp.src([root + path.js + '*.js','!' + root + path.js +'*.min.js'])
        .pipe(plumber())
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(root + path.js));
});

// 压缩js
gulp.task('lib-js', function() {
    return gulp.src([root + path.lib + '**/*.js','!' + root + path.lib +'**/*.min.js'])
        .pipe(plumber())
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(root + path.lib));
});

// 开启监控，当这些文件变化时自动执行任务
gulp.task('watch', function() {
    gulp.watch(root + path.less +  '**/*.less', ['less']);
    gulp.watch(root + path.js + '*.js', ['js']);
});

// 编译lib
gulp.task('lib', function() {
    return gulp.src('./public/' + path.lib +  '**/*.less')
        .pipe(less())
        .pipe(plumber())
        .pipe(autoprefix())
        .pipe(cssmin())
        .pipe(gulp.dest('./public/' + path.lib));
});

// 默认执行所有任务
gulp.task('default',['less','js','lib-less','lib-js'], function() {

});