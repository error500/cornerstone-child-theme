# Example Child theme for the error500-Cornerstone starter theme

## Download

Clone the git repo `https://github.com/error500/cornerstone-child-theme.git` 

Run bower install in cornerstone parent theme

	cd ..
	cd cornerstone
	bower install

Copy cornerstone/libs/foundation/scss/foundation/_settings to your child-themme/scss folder and **remove import line** 'important!'

This allows you to override the foundation settings


Start compass watch

	cd ..
	cd cornerstone-child-theme
	compass watch

Customize foundation for your theme in

	scss/_settings.scss
	
Implement your local (s)css rules in 

	scss/app.scss  


Gulp install command : 
	npm install gulp
	npm install --save-dev gulp-imagemin
	npm install --save-dev gulp-compass
	npm install --save-dev gulp-filter
	npm install --save-dev gulp-uglify		
	npm install --save-dev gulp-htmlmin			

Updating with gulp
	npm update



Gulp commands :

Needs images ? use to save them to img-resource and run
	gulp imagemin 
	=> they will be minified and reachable in img/

Needs javascript ? write it in 
	js/child.js
	(working on minifier also)
	gulp uglify





	
	
## Author

**Stephen Mullen**

Stephen is a web designer and Android app developer based in Preston, UK
+ [Twitter @wirelessguyuk](http://twitter.com/wirelessguyuk)
+ [Website](http://thewirelessguy.co.uk)

Forked by Error500
See readme in parent Fork `https://github.com/error500/cornerstone/blob/master/README.md`