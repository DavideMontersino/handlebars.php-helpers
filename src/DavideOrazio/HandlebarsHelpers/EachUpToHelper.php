<?php
/**
 * This file is part of handlebars.php-helpers
 *
 * PHP version 5.3
 *
 * @category  Xamin
 * @package   Handlebars
 * @author    fzerorubigd <fzerorubigd@gmail.com>
 * @author    Behrooz Shabani <everplays@gmail.com>
 * @author    Dmitriy Simushev <simushevds@gmail.com>
 * @author    Jeff Turcotte <jeff.turcotte@gmail.com>
 * @author    John Slegers <slegersjohn@gmail.com>
 * @copyright 2014 Authors
 * @license   MIT <http://opensource.org/licenses/MIT>
 * @version   GIT: $Id$
 * @link      http://xamin.ir
 */

namespace DavideOrazio\HandlebarsHelpers;

use Handlebars\Context;
use Handlebars\Helper;
use Handlebars\Template;

/**
 * The Each Helper
 *
 * @category  Xamin
 * @package   handlebars.php-helpers
 * @author    Davide Orazio Montersino <davide@davidemontersino.com>
 * @copyright 2014 Authors
 * @version   Release: @package_version@
 * @link      http://xamin.ir
 */
class EachUpToHelper extends CustomHelper
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
        $dataSelector = implode(".", array_slice($args, 0, count($args) - 1));
        $tmp = $context->get($dataSelector);


        if (count($args) == 1)
            $limit = 0;
        else
            $limit = $args[count($args)-1];
        $buffer = '';

        if (!$tmp) {
            $template->setStopToken('else');
            $template->discard();
            $template->setStopToken(false);
            $buffer = $template->render($context);
        } elseif (is_array($tmp) || $tmp instanceof \Traversable) {
            $isList = is_array($tmp) && (array_keys($tmp) === range(0, count($tmp) - 1));
            $index = 0;
            $lastIndex = $isList ? (count($tmp) - 1) : false;

            foreach ($tmp as $key => $var) {
                if ($index+1 > $limit && $limit > 0)
                    continue;
                $specialVariables = array(
                    '@index' => $index,
                    '@first' => ($index === 0),
                    '@last' => ($index === $lastIndex),
                );
                if (!$isList) {
                    $specialVariables['@key'] = $key;
                }
                $context->pushSpecialVariables($specialVariables);
                $context->push($var);
                $template->setStopToken('else');
                $template->rewind();
                $buffer .= $template->render($context);
                $context->pop();
                $context->popSpecialVariables();
                $index++;
            }

            $template->setStopToken(false);
        }

        return $buffer;
    }
}
