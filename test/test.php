<?php
$fun = function (array $context)
{
    print "<pre>";
  print_r($_SERVER);
  print "Bonjour";
};
$fun->call(new stdClass());
var_export(($fun)(['ddd']));