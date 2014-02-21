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
				src: 'src/css/draya.css',
				dest: 'dist/css/draya.min.css'
			}
		},
		uglify: {
			js: {
				files: {
					'dist/js/Hyphenator.min.js': [
						'src/js/Hyphenator.js'
					]
				}
			}
		},
		copy: {
			dist: {
				files: [
					{
						expand: true, 
						cwd: 'src/css/',
						src: [
							'foundation-icons/**',
							'webicons-master/**',
						], 
						dest: 'dist/css/'
					},
					{
						expand: true, 
						cwd: 'src/js/',
						src: [
							'patterns/**'
						], 
						dest: 'dist/js/'
					},
					{
						expand: true, 
						cwd: 'src/img/',
						src: ['**'], 
						dest: 'dist/img/'
					},
					{
						expand: true, 
						cwd: 'src/',
						src: ['*.php'], 
						dest: 'dist/'
					},
					{
						expand: true, 
						cwd: 'src/meta/',
						src: ['**'], 
						dest: 'dist/'
					}
				]
			}
		}
	});

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');

	// Default task(s).
	grunt.registerTask('default', ['jshint', 'cssmin', 'uglify', 'copy']);

};
