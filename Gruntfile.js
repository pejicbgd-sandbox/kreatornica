module.exports = function( grunt ) {

  grunt.initConfig({
    jshint: {
      files: ['admin/js/c.js'],
      options: {
        globals: {
          jQuery: true
        }
      }
    },
    watch: {
      css: {
          files: ['assets/sass/*.scss', 'source/css/*.css'],
          tasks: ['sass', 'cssmin']
      }
    },
    sass: {
      dist: {
        files: {
          'assets/sass/style.css': 'assets/sass/styles.scss'
        }
      }
    },
    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
        files: {
          'assets/css/kreatorci.css': ['assets/sass/style.css']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin')

  grunt.registerTask('default', ['watch', 'sass', 'cssmin']);

};
