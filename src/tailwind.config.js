const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/View/Components/**/*.php",
        "./vendor/usernotnull/tall-toasts/config/**/*.php",
        "./vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                gray: colors.slate,
                primary: {
                    DEFAULT: colors.indigo[600],
                    lightest: colors.indigo[100],
                    lighter: colors.indigo[300],
                    light: colors.indigo[500],
                    dark: colors.indigo[700],
                    darker: colors.indigo[800],
                    darkest: colors.indigo[900],
                },
                muted: {
                    DEFAULT: colors.gray[400],
                    lightest: colors.gray[100],
                    lighter: colors.gray[200],
                    light: colors.gray[300],
                    dark: colors.gray[500],
                    darker: colors.gray[600],
                    darkest: colors.gray[800],
                },
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/aspect-ratio"),
        require("@tailwindcss/line-clamp"),
    ],
};
