/** 
Gulp commands :

	gulp imagemin : Takes images from img-resource and minify them in img
	gulp watch : Execute task compass

*/

var gulp = require ('gulp'),
	/*livereload = require('gulp-livereload'),*/
	compass = require ('gulp-compass'),
	gulpFilter = require('gulp-filter'),
	imagemin = require('gulp-imagemin'),
	htmlmin  = require('gulp-htmlmin');
	uglify  = require('gulp-uglify');


var jsFilter = gulpFilter('js/*.js');
var cssFilter = gulpFilter('css/*.css');
var scssFilter = gulpFilter('scss/*.scss');

gulp.task ('compass', function(){
	return gulp.src('scss/*.scss')
	.pipe(compass({
		config_file: 'config.rb'
	}))
	.pipe(gulp.dest('css'));

})


gulp.task('imagemin', function () {
    gulp.src(['img-resource/*.jpg','img-resource/*.png'])
        .pipe(imagemin())
        .pipe(gulp.dest('img'));
});

gulp.task('minify', function() {
	gulp.src('*.html')
		.pipe(htmlmin({collapseWhitespace: true,minifyJS: true,minifyCSS: true}))
		.pipe(gulp.dest('min'));
	gulp.src('js-resource/*.js')
		.pipe(uglify())
		.pipe(gulp.dest('js'))
});



gulp.task ('default', ['compass'],function () {
	// Minifyed by compass : gulp not usefull
	return gulp.src('./css/app.css')
		.pipe(minifyCss())
		.pipe(gulp.dest('./css-min/'));
	
})

gulp.task('watch', function() {
	/*var server = livereload();*/

	gulp.watch(['scss/*.scss'],['compass'])
	.on('change',
		function(event) {
			console.log ('Modification de '+ event.path);
		}
	);
	/*gulp.watch(['*.php','js/*.js','css/*.css','img/*.*'])
	.on('change',
		function(event) {
			server.changed(event.path);
		}
	);*/

})