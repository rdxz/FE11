var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var connect = require('gulp-connect');
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
    './bower_components/bootstrap/dist/css/bootstrap.min.css'
  ])
    .pipe($.plumber())
    .pipe($.concat('bundle.css'))
    .pipe(gulp.dest(app.devPath + 'static/style'))


  gulp.src([
    './bower_components/angular/angular.min.js',
    './bower_components/angular-route/angular-route.min.js'
  ])
  .pipe($.plumber())
  .pipe($.concat('bundle.js'))
  .pipe(gulp.dest(app.devPath + 'static/js'))
  console.log(app.devPath + 'static/js');
})


gulp.task('script',function(){
  gulp.src('./src/script/**/*.js')
    .pipe($.plumber())
    .pipe($.concat('all.js'))
    .pipe(gulp.dest(app.devPath + 'static/js'))
    .pipe($.rename('all.min.js'))
    .pipe($.uglify())
    .pipe(gulp.dest(app.distPath + 'static/js'))
})


gulp.task('serve',function(){
  connect.server({
    root:[app.devPath],
    livereload:true,
    port:8083
  })
})


gulp.task('template',function(){
  gulp.src('./src/view/**/*.html')
  .pipe($.plumber())
  .pipe(gulp.dest(app.devPath + 'view'))
  .pipe(gulp.dest(app.distPath + 'view'))
})

gulp.task('dev',[
  'copy-bundle',
  'script',
  'template',
  'serve'
])



// 开启服务器
// 监听文件
// 打开浏览器
// 压缩文件
