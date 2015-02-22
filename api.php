<?php
class api
{
    const
        BASE_URL     = 'https://api.moves-app.com/api/1.1/user',
        SUMMARY      = '/summary',
        ACTIVITIES   = '/activities'
    ;

    private $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getSummary()
    {
        $url = self::BASE_URL . self::SUMMARY . '/daily/20150222';
        return $this->getApiResponse($url);
    }

    public function getActivities()
    {
        $url = self::BASE_URL . self::ACTIVITIES . '/daily/20150222';
        return $this->getApiResponse($url);
    }

    private function getApiResponse($url)
    {
        $url = $url . '?access_token=' . $this->accessToken;
        return json_decode(@file_get_contents($url));
    }
}