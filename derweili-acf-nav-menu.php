<?php
/**
 * Plugin Name: ACF Nav Menus Field
 * @package derweili-acf-nav-menu-field
 * @author derweili
 * @license GPL-2.0+
 * Description: Nav Menus Field Type for AFC to select a nav menu
 * Version: 1.0.0
 * Author: derweili
 * Author URI: https://derweili.de
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// check if class already exists.
if ( ! class_exists( 'Derweili_Afc_Nav_Menu' ) ) :

	/**
	 * Plugin Calss
	 */
	class Derweili_Afc_Nav_Menu {

		/**
		 * Field settings
		 *
		 * @var array $settings
		 */
		private $settings;


		/**
		 *  __construct
		 *
		 *  This function will setup the class functionality
		 *
		 *  @type    function
		 *  @date    17/02/2016
		 *  @since   1.0.0
		 *
		 *  @return  void
		 */
		public function __construct() {

			// - these will be passed into the field class.
			$this->settings = array(
				'version' => '1.0.0',
				'url'     => plugin_dir_url( __FILE__ ),
				'path'    => plugin_dir_path( __FILE__ ),
			);

			// include field.
			add_action( 'acf/include_field_types', array( $this, 'include_field' ) ); // v5.
			add_action( 'acf/register_fields', array( $this, 'include_field' ) ); // v4.
		}


		/**
		 *  Include_field
		 *
		 *  This function will include the field type class
		 *
		 *  @type    function
		 *  @date    17/02/2016
		 *  @since   1.0.0
		 *
		 *  @param   integer $version (int) major ACF version. Defaults to false.
		 *  @return  void
		 */
		public function include_field( $version = false ) {

			// load textdomain.
			load_plugin_textdomain( 'derweili-acf-nav-menus', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

			// check for supportet version.
			if ( ! $version || 4 === $version ) {
				add_action( 'admin_notices', array( $this, 'add_version_notice' ) );
				return;
			}

			// include field.
			include_once 'fields/class-derweili-acf-field-nav-menu-v' . $version . '.php';
		}

		/**
		 * Render warning for outdated ACF Version
		 */
		public function add_version_notice() {
			?>
				<div class="notice notice-warning is-dismissible">
					<p><?php esc_html_e( 'ACF Nav Menu Field only suppors ACF Version greater than 5.', 'hits' ); ?></p>
					<p><a href="<?php echo esc_attr( admin_url( 'plugins.php' ) ); ?>?s=Advanced+Custom+Fields&plugin_status=all"><?php esc_html_e( 'Please update your ACF Plugin', 'hits' ); ?></a></p>
				</div>
			<?php
		}

	}


	new Derweili_Afc_Nav_Menu();

endif;

?>
