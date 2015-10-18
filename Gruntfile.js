module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /**
         * Global vars
         */
        project : {
            resources : 'assets',
            assets    : 'public/assets',
            modules   : 'node_modules'
        },

        /**
         * Para monitorizar los archivos
         */
        watch : {
            css : {
                files : ['<%= project.resources %>/css/{,*/}*.css'],
                tasks : ['cssmin', 'copy:static_vendors'],
                options : {
                    livereload : true
                }
            },
            js : {
                files : ['<%= project.resources %>/js/{,*/}*.js'],
                tasks : ['uglify', 'copy:static_vendors'],
                options: {
                    livereload : true
                }
            },
            img : {
                files : ['<%= project.resources %>/img/{,*/}*.{png,jpg,gif}'],
                tasks : ['imagemin'],
                options: {
                    livereload : true
                }
            }
        },

        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: '<%= project.resources %>/css',
                    src: ['*.css'],
                    dest: '<%= project.assets %>/css',
                    ext: '.min.css'
                }]
            }
        },

        uglify: {
            my_target: {
                files: [{
                    expand: true,
                    cwd: '<%= project.resources %>/js',
                    src: '*.js',
                    dest: '<%= project.assets %>/js',
                    ext: '.min.js'
                }]
            }
        },

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: '<%= project.resources %>/img',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: '<%= project.assets %>/img'
                }]
            }
        },

        copy : {
            fonts : {
                expand: true,
                cwd: '<%= project.resources %>/fonts',
                src : '**',
                dest : '<%= project.assets %>/fonts'

            },
            bootstrap: {
                files: [
                    {src: '<%= project.modules %>/bootstrap/dist/css/bootstrap.min.css', dest: '<%= project.assets %>/css/vendor/bootstrap.min.css', filter: 'isFile'},
                    {src: '<%= project.modules %>/bootstrap/dist/css/bootstrap-theme.min.css', dest: '<%= project.assets %>/css/vendor/bootstrap-theme.min.css', filter: 'isFile'},
                    {src: '<%= project.modules %>/bootstrap/dist/js/bootstrap.min.js', dest: '<%= project.assets %>/js/vendor/bootstrap.min.js', filter: 'isFile'},
                    {cwd: '<%= project.modules %>/bootstrap/dist/fonts',src: '**', dest: '<%= project.assets %>/fonts/', expand : true},
                ]
            },
            jquery : {
                files : [
                    {src: '<%= project.modules %>/jquery/dist/jquery.min.js', dest: '<%= project.assets %>/js/vendor/jquery.min.js', filter: 'isFile'},
                ]
            },
            static_vendors : {
                files : [
                    {
                        expand: true,
                        cwd: '<%= project.resources %>/css/vendor',
                        src : '**',
                        dest : '<%= project.assets %>/css/vendor'
                    },
                    {
                        expand: true,
                        cwd: '<%= project.resources %>/js/vendor',
                        src : '**',
                        dest : '<%= project.assets %>/js/vendor'
                    }
                ]

            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('package', [
        'cssmin',
        'uglify',
        'imagemin',
        'copy'
    ]);

    grunt.registerTask('default', [
        'cssmin',
        'uglify',
        'imagemin',
        'copy',
        'watch'
    ]);
};
