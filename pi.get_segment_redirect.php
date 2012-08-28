<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$plugin_info = array(
	'pi_name'        => 'GET Variable to Segment Redirect',
	'pi_version'     => '1.0',
	'pi_author'      => 'Amity Web Solutions Ltd',
	'pi_author_url'  => 'http://www.amitywebsolutions.co.uk/',
	'pi_description' => 'Redirect a GET Variable to a Segment URL',
	'pi_usage'       => Get_segment_redirect::usage()
);

/**
* Get Segment Redirect class
*
* @package        get_segment_redirect
* @author         Amity Web Solutions Ltd <info@amitywebsolutions.co.uk>
* @license        http://creativecommons.org/licenses/by-sa/3.0/
*/
class Get_segment_redirect {

	/**
	* Plugin return data
	*
	* @var         string
	*/
	public $return_data;

	// --------------------------------------------------------------------

	/**
	* Legacy Constructor
	*
	* @see         __construct()
	*/
	public function Get_segment_redirect()
	{
		return $this->__construct();
	}

	// --------------------------------------------------------------------

	/**
	* Constructor
	*
	*/
	public function __construct()
	{
		$this->EE =& get_instance();

		$variable	= $this->EE->TMPL->fetch_param('get_variable');
		if(isset($_GET[$variable]))
		{	
			// fetch params
			$value	= $_GET[$variable];
			$url	= $this->EE->TMPL->fetch_param('base_url');
			$this->EE->functions->redirect($url.$variable.'/'.$value);
		}
		return false;
	}

	/**
	* Plugin usage
	*
	* @return string
	*/
	function usage()
	{
		ob_start(); 
		?>
			This plugin will look at the GET URL variables and redirect the user to the segment version of the URL. For example, http://www.yourdomain.co.uk/template_group/?type=blue will redirect to http://www.yourdomain.co.uk/template_group/type/blue, or any template_group (it can be specified).
			
			Suitable for submitting forms using the GET method for which the form variables will be appended to the URL as a GET variable, but you do not want to use PHP in the template to extract the variables. 
			
			The plugin must be called in the template shown for that URL, as follows:
			{exp:get_segment_redirect get_variable="color" base_url="/template_group/"}
			
			For example, if you submit a form using GET, or link to this URL:
			http://www.yourdomain.com/template_group/?color=blue
			
			The user will be redirected to:
			http://www.yourdomain.com/template_group/color/blue

		<?php
		$buffer = ob_get_contents();

		ob_end_clean(); 

		return $buffer;
	}

	// --------------------------------------------------------------------

}
// END CLASS

/* End of file pi.get_segment_redirect.php */