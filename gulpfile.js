var gulp = require ('gulp'),
	/*livereload = require('gulp-livereload'),*/
	compass = require ('gulp-compass'),
	gulpFilter = require('gulp-filter'),
	imagemin = require('gulp-imagemin');

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
    gulp.src('img-resource/*.jpg')
        .pipe(imagemin())
        .pipe(gulp.dest('img-min'));
});

gulp.task ('default', ['compass'],function () {
	
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