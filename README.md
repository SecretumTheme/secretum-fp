# Secretum Custom Frontpages
* **Plugin Name:** Secretum Custom Frontpages
* **Contributors:** SecretumTheme
* **Tags:** post type, post types, taxonomy, taxonomies, frontpage, front page, secretum
* **Requires at least:** 4.6
* **Tested up to:** 5.0.2
* **Stable tag:** 0.0.2
* **License:** GNU GPLv3
* **License URI:** https://github.com/SecretumTheme/secretum-fp/blob/master/LICENSE

Custom Frontpages Manager


## Description

Secretum Frontpages allows developers to provide a custom frontpage post type that can be any adapted theme. This gives website managers complete and total design control over the websites frontpage, along with the ability to schedule updated changes.

Designed for the Classic WordPress Editor, works perfectly with Gutenberg.


## LICENSE

This is a freemium plugin. The Secretum Frontpages plugin is licensed under GNU GPLv3 under all conditions accept when the plugin is packaged and sold with other premium themes/plugins/services. More information coming soon about commercial licenses.

** This plugin can not packaged with themes within the WordPress repo. Add the action hooks below to your theme, then recommend this plugin for download/activation.


## Example Calls

Using the action hook 'secretum_fp' allows developers to easily integrate Secretum Frontpages without having to worry about errors displaying if the plugin is not active.

The action hook 'secretum_fp' accepts one argument, $args. The array $args is not required, when used it checks for 3 possible keys: orderby|slug|post_id

The 'orderby' key accepts all allowed WP_Query sortby parameters. Default is 'date' with rand|name|title|ID returning the best expected results. Using 'date' allows for the newest published frontpage to be used.

The 'slug' key accepts a valid taxonomy (group/category) slug, forcing the hook to only return frontpages registered to that slug.

The 'post_id' slug overrides both the orderby and slug keys. When the 'post_id' slug is only, only that post will be displayed, if the post is published.

```
echo do_action('secretum_fp', string $type, array $args);
```

Examples:

```
echo do_action('secretum_fp');
echo do_action('secretum_fp', array $args);
echo do_action('secretum_fp', array('orderby' => 'rand', 'slug' => 'test-name'));
echo do_action('secretum_fp', array('post_id' => '101'));
```

The example checks to see if a local setting is active, if so it displays a published frontpage, else it displays the default content.

```
if (get_option('some-local-setting-name')) {
	echo do_action('secretum_fp');

} else {
	// Do default frontpage stuff
}
```


## Coming Soon

* Finish custom columns
* Templates / layouts


## Changelog

= 0.0.1 2018-12-7 =

Alpha Release - Ready For Public Use
