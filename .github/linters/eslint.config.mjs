// Flat ESLint configuration for Super-Linter v9 and modern local ESLint releases.
const coreRules = {
  'no-constant-condition': 'error',
  'no-dupe-keys': 'error',
  'no-undef': 'warn',
  'no-unreachable': 'error',
  'no-unused-vars': 'error'
};

export default [
  {
    ignores: ['**/clipboard-*.min.js', '**/vendor/**/*.js']
  },
  {
    files: ['**/*.js'],
    languageOptions: {
      ecmaVersion: 2021,
      sourceType: 'script',
      globals: {
        '$': 'readonly',
        ClipboardJS: 'readonly',
        console: 'readonly',
        document: 'readonly',
        exports: 'readonly',
        jQuery: 'readonly',
        module: 'readonly',
        navigator: 'readonly',
        require: 'readonly',
        setTimeout: 'readonly',
        window: 'readonly'
      }
    },
    rules: coreRules
  },
  {
    files: ['**/*.mjs'],
    languageOptions: {
      ecmaVersion: 'latest',
      sourceType: 'module'
    },
    rules: coreRules
  }
];
