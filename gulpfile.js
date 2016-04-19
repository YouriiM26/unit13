var     gulp        = require('gulp'),
		sass        = require('gulp-sass'),
		minifycss   = require('gulp-minify-css'),
		sourcemaps  = require('gulp-sourcemaps'),
		livereload  = require('gulp-livereload'),
		prefix      = require('gulp-autoprefixer'),
		plumber     = require('gulp-plumber'),
		notify      = require('gulp-notify'),
		uglify      = require('gulp-uglify'),
		rename      = require('gulp-rename'),
		imagemin    = require('gulp-imagemin'),
		pngquant    = require('imagemin-pngquant'),
		concat      = require('gulp-concat'),
		stripDebug  = require('gulp-strip-debug');

// Styles
gulp.task('sass', function() {
	gulp.src('assets/scss/includes.scss')
	.pipe(sourcemaps.init())
	.pipe(sass())
	.on("error", notify.onError({
		message: 'Error: <%= error.message %>',
		title: 'SASS compilation failed...',
		sound: 'Pop'
	}))
	.pipe(prefix({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(rename('style.css'))
	.pipe(minifycss({compatibility: ''}))
	.pipe(sourcemaps.write('assets/cssmaps'))
	.pipe(gulp.dest('.'))
	.pipe(livereload({host:"illuminati.dev",port:1337,start:true}))
});

// Compress JS
gulp.task('compress', function() {
	gulp.src('assets/js/src/**/*.js')
	.pipe(uglify())
	.pipe(rename({suffix: '.min' }))
	//.pipe(sourcemaps('.'))
	.pipe(gulp.dest('assets/js/min'))
	.pipe(notify({ 
		message: 'Compression task complete', 
		sound: 'Pop'
	}));
});

// Concat Plugins, Minify
/*gulp.task('plugins', function() {
	gulp.src(['assets/js/plugins/*.js'])
	.pipe(concat('plugins.js'))
	.pipe(stripDebug())
	.pipe(uglify())
	.pipe(rename({suffix: '.min' }))
	.pipe(gulp.dest('js/build'));
});*/

// Watch
gulp.task('watch', function(){
	gulp.watch('assets/scss/**/*.scss', ['sass']);
	gulp.watch('assets/js/src/*.js', ['compress']);
	gulp.watch('assets/img/src/*', ['images']);
  //gulp.watch('js/plugins/*.js', ['plugins']);
});

// Images
gulp.task('images', function () {
	return gulp.src('assets/img/src/**/*')
	.pipe(imagemin({
		progressive: true,
		svgoPlugins: [{removeViewBox: false}],
		use: [pngquant()]
	}))
	.pipe(gulp.dest('assets/img/min/'))
		.pipe(notify({ // Add gulpif here
			title: 'Gulp',
			subtitle: 'Success!',
			message: 'Successfully compressed images',
			sound: 'Beep'
		}
	));
});

// Default
gulp.task('default', ['sass','watch']);