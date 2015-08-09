module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    watch: {
        files: ['assets/post/*.css', 'assets/post/**/*.css'],
        tasks: ['postcss'],
        options: {
            livereload: true,
        }
    },

    postcss: {
        options: {
            map: false,
            processors: [
            require('postcss-import')(),
            require('postcss-mixins')(),
            require('postcss-for')(),
            require('postcss-nested')(),
            require('autoprefixer-core')({browsers: 'last 3 version'}),
            require('postcss-simple-vars')(),
            require('cssnano')({autoprefixer: false})
            ]
        },
        dist: {
            expand: true,
            flatten: true,
            src: 'assets/post/*.css',
            dest: 'assets/css/'
        }
    }

  });

  // Grunt Watch
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Post CSS
  grunt.loadNpmTasks('grunt-postcss');

};
