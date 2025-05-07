module.exports = function(grunt) {
    grunt.initConfig({
        clean: ['amd/build'],
        copy: {
            main: {
                files: [
                    {
                        expand: true,
                        cwd: 'amd/src',
                        src: ['**/*.js'],
                        dest: 'amd/build'
                    }
                ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('default', ['clean', 'copy']);
};
