// Cargar los paquetes en variables
var gulp    = require('gulp'),
    phpunit = require('gulp-phpunit'),
    plumber = require('gulp-plumber');

// Tarea que corre los test.
gulp.task('phpunit', function() {
  // El doble asterisco hace que lea todos los subdirectorios.
  gulp.src('tests/**/*.php')
    .pipe(plumber())    // Plumber para que no se corte la ejecución al fallar un test.
    .pipe(phpunit());   // Ejecuta los test.
});

// Tarea que "llama" a la tarea que corre los test (phpunit) cada vez que algo cambia.
gulp.task('watch:tests', function() {
    // Directorios a vigilar...
    gulp.watch('tests/**/*.php', ['phpunit']);  // Vigilar los test (porque primero deben fallar)
    gulp.watch('app/**/*.php', ['phpunit']);    // Vigilar Modelos y controladores
    gulp.watch('routes/**/*.php', ['phpunit']); // Vigilar Rutas
});

// Tarea por defecto requerida, tiene que estar. Además llama a las definidas por nosotros.
gulp.task('default', ['phpunit','watch:tests']);
