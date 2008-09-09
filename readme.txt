=== List Tags ===
Contributors: SteveSmith1983
Donate link: http://www.stevesmith1983.co.uk
Tags: tags, template
Requires at least: 2.6.1
Tested up to: 2.6.2
Stable tag: trunk

List Tags adds the list_tags() template tag.  It is essentially the same function as wp_list_categories(), but for tags.


== Description ==

List Tags adds the `list_tags()` template tag.  It is essentially the same function as `wp_list_categories()`,
but for tags, and as such takes the [same arguments](http://codex.wordpress.org/Template_Tags/wp_list_categories).

This is in beta, please [let me know](http://wordpress.org/extend/plugins/list-tags/other_notes) if there are any problems.


== Installation ==

1. Upload `list-tags` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php list_tags(); ?>` in your templates
1. Configure the tag list using the arguments at (http://codex.wordpress.org/Template_Tags/wp_list_categories)


== Frequently Asked Questions ==

= Does this work with other versions of WordPress? =

Probably!  If you've got a version other than 2.6.1 and it works, [let me know](http://wordpress.org/extend/plugins/list-tags/other_notes) and I'll update the requirements.

= Why doesn't one of the wp_list_categories() arguments work with list_tags()? =

Not all of them have been tested.  If there seems to be a problem, [let me know](http://wordpress.org/extend/plugins/list-tags/other_notes).


== Support ==

Support and feedback for List Tags is available on the [WordPress Forums](http://wordpress.org/tags/list-tags).
Make sure you tag new threads about this plugin with List Tags so that I see it!