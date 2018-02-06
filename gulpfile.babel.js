'use strict';

import gulp from 'gulp';
import LessAutoprefix from 'less-plugin-autoprefix';
import gulpLoadPlugins from 'gulp-load-plugins';

const $ = gulpLoadPlugins();
const autoprefix = new LessAutoprefix({
  browsers: ['last 2 versions']
});

gulp.task('lint', () =>
  gulp.src(['assets/scripts/bundle.js'])
    .pipe($.eslint())
    .pipe($.eslint.format())
);

gulp.task('less', () =>
  gulp.src(['assets/less/index.less'])
    .pipe($.less({
      plugins: [autoprefix]
    }))
    .pipe($.minifyCss())
    .pipe($.rename('style.css'))
    .pipe(gulp.dest('assets/css/'))
);

gulp.task('scripts', () =>
  gulp.src(['assets/scripts/app.js'])
    .pipe($.concat('index.js', {
      newLine: ';'
    }))
    .pipe($.babel())
    .pipe($.uglify())
    .pipe($.rename('bundle.js'))
    .pipe(gulp.dest('assets/scripts/'))
);

gulp.task('stream', () =>
  gulp.watch(['assets/**/*'], ['scripts', 'less'])
);

gulp.task('default', ['stream']);