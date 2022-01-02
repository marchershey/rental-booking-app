// tailwind.config.js
const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    theme: {
        colors: {
            primary: {
                DEFAULT: colors.blue[500],
                light: colors.blue[300],
                dark: colors.blue[600],
                muted: colors.gray[400],
            },
            muted: colors.gray[400],
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            yellow: colors.yellow,
            red: colors.red,
            blue: colors.blue,
            indigo: colors.indigo
        },
        variants: {
            extend: {
                backgroundColor: ['disabled'],
                textColor: ['disabled'],
            }
        },
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
        plugins: [
            require('@tailwindcss/forms'),
        ],

    },
}