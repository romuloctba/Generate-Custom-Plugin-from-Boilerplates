# Custom Plugin From Boilerplate 

- Use this to make custom plugins from standard boilerplates, in a quick and reusable way.

- The included [example](https://github.com/romuloctba/Generate-Custom-Plugin-from-Boilerplates/tree/master/template) uses [Vi Lourenco's WooCommerce Extension Plugin Boilerplate](https://github.com/ViLourenco/woocommerce-extension-plugin-boilerplate) as a template. 

**The version *with variables* is in the [./template folder](https://github.com/romuloctba/Generate-Custom-Plugin-from-Boilerplates/tree/master/template)**

- Se the [`.DEFAULT_SETTINGS`](https://github.com/romuloctba/Generate-Custom-Plugin-from-Boilerplates/blob/master/.DEFAULT_SETTINGS) file, replacing the variable contents as you wish

- Simply run `npm start`

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