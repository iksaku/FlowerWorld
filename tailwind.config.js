const defaultConfig = require('tailwindcss/defaultConfig');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultConfig.theme.fontFamily.sans],
            },
        },
    },
    purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    variants: {
        backgroundColor: [...defaultConfig.variants.backgroundColor, 'hocus'],
        boxShadow: [...defaultConfig.variants.boxShadow, 'hocus'],
        textDecoration: [...defaultConfig.variants.textDecoration, 'hocus'],
        textColor: [...defaultConfig.variants.textColor, 'hocus'],
        scale: [...defaultConfig.variants.scale, 'hocus'],
        zIndex: [...defaultConfig.variants.zIndex, 'hocus'],
    },
    plugins: [
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/ui'),
        require('@iksaku/tailwindcss-plugins/plugins/variants/hocusVariant'),
        require('@iksaku/tailwindcss-plugins/plugins/utilities/borderXY'),
    ],
};
