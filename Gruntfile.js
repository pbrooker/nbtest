module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-composer');

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        project: {
            assets: ['assets'],
            components: ['bower_components'],
            sass: ['<%= project.assets %>/compass/sass/']
        },

        bower: {
            install: {
                options: {
                    targetDir: './bower_components',
                    install: true,
                    verbose: false,
                    copy: false,
                    cleanTargetDir: false,
                    cleanBowerDir: false,
                    bowerOptions: {}
                }
            }
        },

        watch: {
            src: {
                files: ['**/*.scss'],
                tasks: ['compass:dev']
            },
            options: {
                livereload: true,
            },
        },

        compass: {
            dev: {
                options: {
                    config: '<%= project.assets %>/compass/config.rb',
                    sassDir: '<%= project.assets %>/compass/sass',
                    cssDir: '<%= project.assets %>/css',
                    noLineComments: true,
                    outputStyle: 'expanded', /* expanded or compressed */
                },
                files: {
                    '<%= project.assets %>/css/bootstrap.css':'<%= project.assets %>/compass/sass/bootstrap.scss',
                    '<%= project.assets %>/css/main.css':'<%= project.assets %>/compass/sass/main.scss'
                }
            }
        },

        composer : {
            options : {
                usePhp: true,
                composerLocation: '/usr/local/bin/composer'
            }
        },

        jshint: {
            all: ['*.js'],
            options: {
                reporterOutput: ''
            }
        },
        '<%= project.assets %>/css/bootstrap.min.css': '<%= project.assets %>/css/bootstrap.css',
        cssmin: {
            my_target: {
                files:
                    {
                        '<%= project.assets %>/css/bootstrap.min.css': '<%= project.assets %>/css/bootstrap.css',
                        '<%= project.assets %>/css/main.min.css': '<%= project.assets %>/css/main.css',
                        '<%= project.assets %>/css/jquery.combined.min.css':
                            [
                                '<%= project.assets %>/css/tooltip.css',
                                '<%= project.assets %>/css/popover.css',
                                '<%= project.components %>/intro.js/introjs.css',
                                '<%= project.components %>/datatables/media/css/dataTables.bootstrap.min.css',
                                '<%= project.assets %>/css/bower.modifications.css',
                            ]
                    }
            }
        },

        concat: {
            options: {
                banner: '/*! <%= pkg.name %>' + ' <%= grunt.template.today("yyyy-mm-dd") %> */\n',
                compress: true
            },
            jquery: {
                src: [
                    '<%= project.components %>/bootstrap-sass-official/assets/javascripts/bootstrap.js',
                    '<%= project.components %>/jquery-migrate/jquery-migrate.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.core.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.widget.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.mouse.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.sortable.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.slider.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.effect.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.effect-highlight.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.effect-shake.js',
                    '<%= project.components %>/jquery-ui/ui/jquery.ui.datepicker.js',
                    '<%= project.components %>/minimalect/jquery.minimalect.js',
                    '<%= project.components %>/jquery-autocomplete/dist/jquery.autocomplete.js',
                    '<%= project.components %>/jquery.validate/dist/jquery.validate.js',
                    '<%= project.components %>/jquery-file-upload/js/vendor/jquery.ui.widget.js',
                    '<%= project.components %>/jquery-file-upload/js/jquery.fileupload.js',
                    '<%= project.components %>/datatables/media/js/jquery.dataTables.js',
                ],
                dest: '<%= project.assets %>/js/jquery.combined.js'
            },
            app: {
                src:  [

                ],
                dest: '<%= project.assets %>/js/app.js',
            },
            onboarding: {
                src:  [
                    '<%= project.components %>/bootstrap/dist/js/bootstrap.min.js',
                    '<%= project.components %>/jquery.validate/dist/jquery.validate.js',
                    '<%= project.components %>/minimalect/jquery.minimalect.js',
                ],
                dest: '<%= project.assets %>/js/onboarding/main.js'
            },
            partner: {
                src:  [

                ],
                dest: '<%= project.assets %>/js/partner/main.js'
            }
        },

        uglify: {
            options: {
                banner: '/*! <%= pkg.name %>' + ' <%= grunt.template.today("yyyy-mm-dd") %> */\n',
                compress: {}
            },
            jquery: {
                files: {
                    '<%= project.assets %>/js/jquery.combined.min.js': ['<%= project.assets %>/js/jquery.combined.js']
                }
            },
            app: {
                files: {
                    '<%= project.assets %>/js/app.min.js': ['<%= project.assets %>/js/app.js']
                }
            },
            onboarding: {
                files: {
                    '<%= project.assets %>/js/onboarding/main.min.js': ['<%= project.assets %>/js/onboarding/main.js']
                }
            },
            partner: {
                files: {
                    '<%= project.assets %>/js/partner/main.min.js': ['<%= project.assets %>/js/partner/main.js']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-bower-task');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // default task that work locally or on Alongside.net development server
    grunt.registerTask('default', ['bower','jshint','compass','cssmin','concat','uglify']);

    // development tasks that initializes Sass Watch to compile each time a file is saved
    grunt.registerTask('dev', ['bower','jshint','compass','cssmin','concat','uglify','watch']);

    // only run production configuration and move CSS to CDN on Amazon S3
    grunt.registerTask('prod', ['bower','jshint','compass','cssmin','concat','uglify']);
};

