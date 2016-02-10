module.exports = function (grunt) {
    // All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        jshint: {
            options: {
                reporter: require('jshint-stylish')
            },
            target: ['js/global.js']
        },

        concat: {
            //Configuration for concatinating files goes here
            dist: {
                src: [
                    'js/*.js', //All JS in this libs folder
                    'js/global.js' //This specific file
                ],
                dest: 'js/build/production.js'
            }
        },

        uglify: {
            // Get's the previously concatenated file to minify it into a new one

            build: {
                src: 'js/*.js',
                dest: 'js/build/production.min.js'
            }
        },
// run image optimization
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'img/build/'
                }]
            }
        },

        // SASS task config
        sass: {
            options: {
                "sourcemap=none": ''
            },
            dev: {
                files: {
                    // destination         // source file
                    "css/style.css": "scss/*.scss"
                },
                options: {
                    style: 'compressed'
                }
            }
        },
// minify css
        cssmin: {
            options: {
                sourceMap: true,
                target: 'release/css'
            },
            target: {
                files: [{
                    expand: true,
                    cwd: 'css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'css/build',
                    ext: '.min.css'
                }]
            }
        },

        // Watch task config
        watch: {
            sass: {
                files: "scss/*.scss",
                tasks: ['sass']
            }
        }
    });

    //  Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    //  Where we tell Grunt what to do when we type "grunt" into terminal.
    grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'imagemin', 'sass', 'cssmin', 'watch']);
};
