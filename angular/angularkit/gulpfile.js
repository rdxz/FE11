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

gulp.task('watch',function() {
  gulp.watch('./src/script/**/*.js',['script']);
  // gulp.watch('./src/srcipt/*.js',['script']);
  gulp.watch('./src/view/**/*.html', ['template']);
})

gulp.task('template',function(){
  gulp.src('./src/view/**/*.html')
  .pipe($.plumber())
  .pipe(gulp.dest(app.devPath + 'view'))
  .pipe(gulp.dest(app.distPath + 'view'))
})



// 读取gulp里面的所有js文件
fs.readdirSync('./gulp').filter(function (file) {
  return (/\.(js|ts|es)$/i).test(file);
}).map(function (file) {
  // console.log(file);
  require('./gulp/' + file);
})


gulp.task('dev',[
  'copy-bundle',
  'script',
  'template',
  'serve',
  'watch'
])

gulp.task('dist',[
  'copy-bundle',
  'script',
  'template',
])



// 开启服务器
// 监听文件
// 打开浏览器
// 压缩文件
