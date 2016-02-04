module.exports = function(grunt){
	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		jshint:{
			options: {
				reporter: require('jshint-stylish')
			},
			target: ['global.js']
		}

		concat: {
			// 2. Configuration for concatinating files goes here
			dist: {
				src:[
					'js/libs/*.js', //All JS in this libs folder
					'js/global.js' //This specific file
				],
				dest: 'js/build/production.js'
			}
		},

		autoprefixer: {
			dist: {
				files: {
					'build/style.css': 'style.css'
				}
			}
		},

		uglify: {
			// Get's the previously concatenated file to minify it into a new one
			option: {
				banner:'/*! <%= pkg.name %> <% grunt.template.today("yyyy-mm-dd") %> */\n'
			},

			build: {
				src: 'js/build/production.js',
				dest: 'js/build/production.min.js'
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'images/build/'
				}]
			}
		},

		watch: {
			options: {
				livereload: true,
			},

			scripts: {
				files: ['js/*.js'],
				tasks: ['concat', 'uglify'],
				option: {
					spawn: false,
				}
			},

			styles: {
				files: ['style.css'],
				tasks: ['autoprefixer']
			},

			css: {
				files: ['css/*.scss'],
				tasks: ['sass'],
				options: spawn: false,
			}
		}

		sass: {
			dist: {
				options: {
					style: 'compress'
				},

				files: {
					'css/build/global.css' : 'css/global.scss'
				}
			}
		}
	});

	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');

	// 4. Where we tell Grunt what to do when we type "grunt" into terminal.
	grunt.registerTask('default', ['jshint', 'autoprefixer', 'watch', 'concat', 'uglify', 'imagemin']);
}