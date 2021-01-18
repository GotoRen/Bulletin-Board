<?php

/**
 * Contents: premember.php
 * Feature: 会員本登録用スクリプト
 * @author r0719en@pluslab.org
 */

define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '../php_libs/init.php';
$controller = new PrememberController();
$controller->run();

exit;