<?php namespace Adamsmeat\Output;

/*
 * Output Manager leveraging view composers to prepare
 * globals and partials
 */
class DefaultViewComposer {

    // Illuminate\View\View
    protected $view;

    // Adamsmeat\Output\Manager
    protected $output;

    /*
     * This gets called when an assigned viewfile is requested to be created
     * This will be a good place to assign global variables for your views
     */
    public function compose($view)
    {
        // fetch
    	$this->view = $view;
        $this->output = $this->view->getEnvironment()->getShared()['app']['output'];

        // do
        $this->_applyGlobalVars();
        $this->_buildPartials();
    }

    /*
     * Meant to set all view variables(mostly strings or iterated array)
     * that should be available globally(main and subviews).
     * To be accessed through $g in view files;
     */
    protected function _applyGlobalVars() 
    {
        $this->view->getEnvironment()->share('g', $this->output->cfg('globals'));
    }

    protected function _buildPartials() 
    {
        foreach ($this->output->cfg('partials') as $key => $file)
            $this->view->nest($key, $file);
    }
}