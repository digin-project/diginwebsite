module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin: {
            options: {
                sourceMap: true
            },
            target: {
                files: {
                    'styles/css/wata.min.css': ['styles/css/wata.css']
                }
            }
        },
        uglify: {
            my_target: {
                files: {
                    'scripts/wata.min.js': ['scripts/wata.js']
                }
            }
        },
        sass: {
            dist: {
                options: {
                    trace : true
                },
                files: {
                    'styles/css/wata.css' : ['styles/sass/wata.scss']
                }
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: [
                    'libs/jquery/jquery-2.1.1.min.js',
                    'libs/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
                    'libs/materialize/js/materialize.custom.min.js',
                    'libs/imagesloaded/imagesloaded.pkgd.min.js',
                    'libs/shufflejs/jquery.shuffle.modernizr.min.js',
                    'libs/masonry/dist/masonry.pkgd.min.js',
                    'libs/ajaxchimp/jquery.ajaxchimp.min.js',
                    'libs/isinviewport/isInViewport.min.js',
                    'scripts/wata.min.js',
                    'libs/triangles/js/triangles.min.js'
                ],
                dest: 'scripts/build.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');

    // Default task(s).
    grunt.registerTask('default', ['sass:dist','cssmin', 'uglify', 'concat']);
    grunt.registerTask('build_lib', ['concat']);

};
