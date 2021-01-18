<?php
$password = 'password';

// パスワードのハッシュ化
function get_hashed_password($password) {
    $cost = 10; // コストパラメータ (04 ~ 31)
    $salt = strtr(base64_encode(random_bytes(16)), '+', '.'); // ランダムな文字列を生成
    $salt = sprintf("$2y$%02d$", $cost) . $salt; // ソルトを生成
    $hash = crypt($password, $salt); // 文字列のハッシュ化

    return $hash;
}

print get_hashed_password($password);