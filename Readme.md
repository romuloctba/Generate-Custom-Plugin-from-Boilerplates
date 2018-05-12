# New Plugin from boilerplate generator

- Use this to make a boilerplate quickly reusable, by setting simple variables to customize your project.

- The included example uses https://github.com/ViLourenco/woocommerce-extension-plugin-boilerplate as a template. The version *with variables* is in the ./template folder

- Check the `.DEFAULT_SETTINGS` file, replacing the variable contents as you wish
- then run npm start

### .DEFAULT_SETTINGS explained:

```
module.exports = {
    variables: [   // ---> These are the variables that exist in the template.
        '${PLUGIN_NAME}', // change this as you wish
        '${PLUGIN_AUTHOR}',
        '${PLUGIN_TEXT_DOMAIN}',
        '${PLUGIN_DESCRIPTION}',
        '${PLUGIN_CLASS_NAME}',
        '${PLUGIN_URL}'
    ],
    variableValues: { // ---> Add here the variable name as a KEY
        '${PLUGIN_NAME}': 'Test Plugin Name Here', // And it's value will replace the variable in the template files
        '${PLUGIN_TEXT_DOMAIN}': 'test_plugin_domain',
        '${PLUGIN_DESCRIPTION}': 'test plugin description. This is very nice.',
        '${PLUGIN_CLASS_NAME}': 'Test_Plugin_Class',
        '${PLUGIN_AUTHOR}': 'RC Dev',
        '${PLUGIN_URL}': 'http://rcdevlabs.github.io'
    },
    templatePath: './template', // --> Default template folder
    dist: '../woo-dist' // -> default output (results) folder
};
```