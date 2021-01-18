<?php

/**
 * Contents: system.php
 * Feature: 管理者実行スクリプト
 * @author r0719en@pluslab.org
 */

define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '../php_libs/init.php';
$controller = new SystemController();
$controller->run();

exit;