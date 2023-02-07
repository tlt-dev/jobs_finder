<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsModifierCompiler
 */
/**
 * Smarty strip modifier plugin
 * Type:     modifier
 * Name:     strip
 * Purpose:  Replace all repeated spaces, newlines, tabs
 *              with a single space or supplied replacement string.
 * Example:  {$var|strip} {$var|strip:"&nbsp;"}
 * Date:     September 25th, 2002
 *
 * @link   https://www.smarty.net/manual/en/language.modifier.strip.php strip (Smarty online manual)
 * @author Uwe Tews
 *
 * @param array $params parameters
 *
 * @return string with compiled code
 */
function smarty_modifiercompiler_strip($params)
{
    if (!isset($params[ 1 ])) {
        $params[ 1 ] = "' '";
    }
    return "preg_replace('!\s+!" . Smarty::$_UTF8_MODIFIER . "', {$params[1]},{$params[0]})";
}
