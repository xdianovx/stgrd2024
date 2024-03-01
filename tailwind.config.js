/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            container: {
                center: true,
                padding: "30px",
            },

            screens: {
                xl: { max: "1680rem" },
            },
        },
    },
    plugins: [
        function ({ addComponents }) {
            addComponents({
                ".container": {
                    maxWidth: "1740px",
                    // "@screen xl": {
                    //     maxWidth: "1560px",
                    // },
                    // "@screen lg": {
                    //     maxWidth: "1280px",
                    // },
                    // "@screen md": {
                    //     maxWidth: "1054px",
                    //     padding: "0 15px",
                    // },
                    // "@screen sm": {
                    //     maxWidth: "882px",
                    // },
                    // "@screen xs": {
                    //     maxWidth: "520px",
                    // },
                },
            });
        },
    ],
};
