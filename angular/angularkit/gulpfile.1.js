var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
// var plumber = require('gulp-plumber');

// 打开一个服务器

// 定义路径
var app = {
  devPath:'./build/',
  distPath:'./dist/',
  srcPath:'./src/'
}

gulp.task('copy-bundle',function() {
  gulp.src([
    '/bower_components/angular/angular.min.js',
    '/bower_components/angular-route/angular-route.min.js'
  ])
  .pipe($.plumber())
  .pipe($.concat('bundle.js'))
  .pipe(gulp.dest(app.devPath + 'static/js'))
  console.log(app.devPath + 'static/js');
})

gulp.task('dev',[
  'copy-bundle'
])
