let mix = require("laravel-mix");

mix.js("public/js/app.js", "public/js/app.min.js").postCss("public/css/app.css", "public/css/app.min.css", [require("tailwindcss")]);