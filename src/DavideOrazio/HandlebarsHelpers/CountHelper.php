<?php
/**
 * This file is part of Handlebars.php-helpers
 *
 * PHP version 5.3
 *
 * @category  Xamin
 * @package   handlebars.php-helpers
 * @author    Davide Orazio Montersino <davide@davidemontersino.com>
 * @copyright 2014 Authors
 * @license   MIT <http://opensource.org/licenses/MIT>
 * @version   GIT: $Id$
 * @link      https://github.com/DavideMontersino/handlebars.php-helpers
 */

namespace DavideOrazio\HandlebarsHelpers;

use Handlebars\Context;
use Handlebars\Helper;
use Handlebars\Template;

/**
 * The EachUpTo Helper allows to limit the number of items shown in a {{#each}} loop
 *
 * @category  Xamin
 * @package   handlebars.php-helpers
 * @author    Davide Orazio Montersino <davide@davidemontersino.com>
 * @copyright 2014 Authors
 * @version   Release: @package_version@
 * @link      https://github.com/DavideMontersino/handlebars.php-helpers
 */
class CountHelper extends CustomHelper
{
    /**
     * Execute the helper
     *
     * @param \Handlebars\Template $template The template instance
     * @param \Handlebars\Context  $context  The current context
     * @param array                $args     The arguments passed the the helper
     * @param string               $source   The source
     *
     * @return mixed
     */
    public function execute(Template $template, Context $context, $args, $source)
    {
        $args = $this->ParseArgs($args);
        $tmp = $context->get($args[0]);
        
        return count($tmp);

    }
}
