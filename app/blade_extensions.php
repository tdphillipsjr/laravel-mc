<?php

/**
 * <code>
 * {? $x = 1 ?} -> <?php $x = 1; ?>
 * </code>
 *
 * Exists to allow regular variable assignment in blade templates.
 */
Blade::extend(function($value)
{
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1}; ?>', $value);
});
