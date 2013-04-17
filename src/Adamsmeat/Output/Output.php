<?php namespace Adamsmeat\Output;

use Illuminate\Config\Repository as ConfigRepo;
use Illuminate\View\Environment as ViewEnv;
use Michelf\Markdown;
use Adamsmeat\Output\Fuel\Core\Arr;

/*
 * Summary: This just checks current value of package config and
 * ultimately will return view to be consumed by browser
 */
class Output {

	// overrides
	public $memory = array();
    
    /**
     * Instantiate a new Manager.
     */
    public function __construct(ConfigRepo $config, ViewEnv $environment, Markdown $markdown)
    {
    	// services
		$this->config = $config;
		$this->environment = $environment;
		$this->markdown = $markdown;
	}

    /**
     * Specifying a theme corresponds to overriding values in your root config
     *
     * @param string $theme 
     * @return Adamsmeat\Output\Manager
     */
	public function setTheme($theme = 'default') {
		if ($theme !== 'default' && is_array($this->cfg($theme)))
			$this->cfg($this->cfg($theme));
		return $this;
	}	


    /**
     * Either get config value or reconfigure by passing an array
     *
     * @param mixed $config string gets value, array sets value.
     * @return mixed returns config value or the manager object
     */
	public function cfg($config = '')
	{
		switch(gettype($config)) 
		{
			case 'string':

				if ($config === '') return $this->config->get('output::config');
				return $this->config->get('output::'.$config);
				break;

			case 'array':

				$flat_config = Arr::flatten($config, '.');

				foreach ($flat_config as $key => $value)
					$this->config->set('output::'.$key, $value);
		
				return $this;
		}

	}

    /**
     * Sends final view string
     *
     * @param mixed $config string gets value, array sets value.
     */	
	public function sendView($data = array()) 
	{

		// apply composers prior to building
		foreach ($this->cfg('composers') as $file => $class)
        	$this->environment->composer($file, $class);

		return $this->environment->make($this->cfg('file'), $data);
	}


	/**
	 * Get global output variable.
	 *
	 * @param  string  $key 
	 * @return mixed false if key is not set
	 */	
	public function g($key) 
	{
		return isset($this->environment->getShared()['g'][$key]) ? 
			$this->environment->getShared()['g'][$key] : false;
	}

    /**
     * Returns a string of css link tags.
     *
     * @param array $file_filter filter files to output e.g. array('bootstrap')
     */
	public function css(array $file_filter = array())
	{
		$html = '';

		// determine what to output
		$css_array = empty($file_filter) ?
		 	// all
			$this->cfg('assets.css') :
			// intersection only
			array_intersect_key(
				$this->cfg('assets.css'), 
				array_flip($file_filter)
			);

		foreach ($css_array as $css_key => $css_link)
			$html .= '<link id="'.$css_key.'-css" href="'.$css_link.'" rel="stylesheet">'."\n";
			
		return $html;
	}

    /**
     * Returns a string of js script tags.
     *
     * @param array $file_filter filter files to output e.g. array('jquery')
     * @param string $head_or_footer specify which group you are working on
     */
	public function js(array $file_filter = array(), $head_or_footer = 'head')
	{
		$html = '';

		// determine what to output
		$js_array = empty($file_filter) ?
		 	// all
			$this->cfg('assets.js.'.$head_or_footer) :
			// intersection only
			array_intersect_key(
				$this->cfg('assets.js.'.$head_or_footer), 
				array_flip($file_filter)
			);

		foreach ($js_array as $js_key => $js_link)
			$html .= '<script id="'.$js_key.'-js" src="'.$js_link.'"></script>'."\n";
			
		return $html;		
	}

	public function getMarkdown()
	{
		return $this->markdown;
	}

	public function md_to_html($text)
	{
		return $this->markdown->defaultTransform($text);
	}



}