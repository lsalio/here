<?php
/**
 *
 * @author ShadowMan
 */

class Widget_Html_Header extends Abstract_Widget {
    public function start() {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />
    <title><?php self::$_options->output('title'); ?></title>
</head>
<body>
<?php
    }
}

?>