<?php
namespace Teikk\SageHookAnnotations\Hooks;

use Teikk\SageHookAnnotations\Hookable;
use WpHookAnnotations\Hooks\Model\{Action, Filter, Shortcode};

class ExampleHook extends Hookable
{
    /**
    * @Filter(tag="the_content", priority=1, accepted_args=1)
    */
    public function modifyContent($content)
    {
        return $content . ' modified';
    }

    /**
    * @Action(tag="wp", priority=1)
    */
    public function action()
    {
        echo 'Helo its me';
    }
    /**
    * @Shortcode(tag="the_shortcode_name")
    */
    public function shortcode()
    {
        return 'Im shortcode';
    }
}
