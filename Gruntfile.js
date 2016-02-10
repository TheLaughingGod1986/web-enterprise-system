module.exports = function(grunt){
	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		jshint:{
			options: {
				reporter: require('jshint-stylish')
			},
			target: ['js/global.js']
		},

		concat: {
			// 2. Configuration for concatinating files goes here
			dist: {
				src:[
					'js/*.js', //All JS in this libs folder
					'js/global.js' //This specific file
				],
				dest: 'js/build/production.js'
			}
		},

		uglify: {
			// Get's the previously concatenated file to minify it into a new one
			option: {
				banner:'/*! <%= pkg.name %> <% grunt.template.today("yyyy-mm-dd") %> */\n'
			},

			build: {
				src: 'js/*.js',
				dest: 'js/build/production.min.js'
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'img/build/'
				}]
			}
		},

		watch: {
			scripts: {
				files: ['js/*.js'],
				tasks: ['concat', 'uglify'],
				option: {
					spawn: false,
				}
			},

			css: {
				files: ['scss/*.scss'],
				tasks: ['sass'],
				options: {
					spawn: false,
				}
			},

			options: {
				livereload: true,
			}
		},

		sass: {
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'inline',
					update: 'true'
				},

				files: {
					'css/main.css': 'scss/*.scss'
				}
			}
		}
	});

	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-sass');

	// 4. Where we tell Grunt what to do when we type "grunt" into terminal.
	grunt.registerTask('default', ['jshint', 'watch', 'concat', 'sass', 'uglify', 'imagemin']);
}