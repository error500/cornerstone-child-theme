# Example Child theme for the error500-Cornerstone starter theme

## Download

Clone the git repo `https://github.com/error500/cornerstone-child-theme.git` 

Run bower install in cornerstone parent theme

	cd ..
	cd cornerstone
	bower install

Start compass watch

	cd ..
	cd cornerstone-child-theme
	compass watch

Customize foundation for your theme in

	scss/_settings.scss
	
Implement your local (s)css rules in 

	scss/app.scss  

Workin with gulp
You should install gulp and som modules with
	npm install gulp
	npm install --save-dev gulp-imagemin
	npm install --save-dev gulp-compass
	npm install --save-dev gulp-filter

So that your images should be located in img-resource and the gulp imagemin action will target to img folder


	
	
## Author

**Stephen Mullen**

Stephen is a web designer and Android app developer based in Preston, UK
+ [Twitter @wirelessguyuk](http://twitter.com/wirelessguyuk)
+ [Website](http://thewirelessguy.co.uk)

Forked by Error500
See readme in parent Fork `https://github.com/error500/cornerstone/blob/master/README.md`