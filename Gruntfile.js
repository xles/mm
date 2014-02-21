module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		jshint: {
			all: [
				'Gruntfile.js'
			]
		},
		cssmin: {
			css:{
				src: 'css/draya.css',
				dest: 'css/draya.min.css'
			}
		},
		uglify: {
			js: {
				files: {
					'js/Hyphenator.min.js': [
						'js/Hyphenator.js'
					]
				}
			}
		}
	});

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Default task(s).
	grunt.registerTask('default', ['jshint', 'cssmin', 'uglify']);

};
