# Advanced Custom Fields: FIELD_LABEL Field #
**Contributors:** derweili  
**Tags:** acf menu nav  
**Requires at least:** 5.0  
**Tested up to:** 5.2  
**Stable tag:** trunk  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  

Add Custom ACF Field to select Nav Menus

## Description ##

Add Custom ACF Field to select Nav Menus

How to use the field on the frontend:

```
$menu_id = get_field('_field_name' );
if( $menu_id ){
  $menu = get_term($menu_id);
  wp_nav_menu( array(
    'menu' => $menu,
  ) );
}

```

### Compatibility ###

This ACF field type is compatible with:
* ACF 4

## Installation ##

1. Copy the `derweili-acf-nav-menu-field` folder into your `wp-content/plugins` folder
2. Activate the ACF Nav Menus Field plugin via the plugins admin page
3. Create a new field via ACF and select the Nav Menu type
4. Read the description above for usage instructions

## Changelog ##

### 1.0.0 ###
* Initial Release.
