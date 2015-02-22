<?php
require_once('config.php');

const SCOPE = 'activity location';

if (!isset($_GET['code']) || empty($_GET['code'])) {
    header('Location: https://api.moves-app.com/oauth/v1/authorize?response_type=code&client_id=' . CLIENT_ID . '&scope='. rawurlencode(SCOPE));
    exit;
}

$obj = json_decode(@file_get_contens(
    'https://api.moves-app.com/oauth/v1/access_token',
    false,
    stream_context_create(
        [
            'http' => [
                'method'  => 'POST',
                'content' => http_build_query([
                    'grant_type'    => 'authorization_code',
                    'code'          => $_GET['code'],
                    'client_id'     => CLIENT_ID,
                    'client_secret' => CLIENT_SECRET,
                    'redirectUri'   => REDIRECT_URI,
                ]),
            ],
        ]
    )
));

$userId = $obj->user_id;
$accessToken = $obj->access_token;
$refreshToken = $obj->refresh_token;

echo "<p>あなたのユーザーIDは<mark>{$userId}</mark>です。</p>";
echo "<p>あなたのアクセストークンは<mark>{$accessToken}</mark>です。</p>";
echo "<p>あなたのリフレッシュトークンは<mark>{$refreshToken}</mark>です。</p>";