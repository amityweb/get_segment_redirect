This plugin will look at the GET URL variables and redirect the user to the segment version of the URL. For example, http://www.yourdomain.co.uk/template_group/?type=blue will redirect to http://www.yourdomain.co.uk/template_group/type/blue, or any template_group (it can be specified).
			
Suitable for submitting forms using the GET method for which the form variables will be appended to the URL as a GET variable, but you do not want to use PHP in the template to extract the variables. 

The plugin must be called in the template shown for that URL, as follows:
{exp:get_segment_redirect get_variable="color" base_url="/template_group/"}

For example, if you submit a form using GET, or link to this URL:
http://www.yourdomain.com/template_group/?color=blue

The user will be redirected to:
http://www.yourdomain.com/template_group/color/blue