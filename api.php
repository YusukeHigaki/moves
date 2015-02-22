<?php
class api
{
    const
        BASE_URL     = 'https://api.moves-app.com/api/1.1/user',
        SUMMARY      = '/summary',
        ACTIVITIES   = '/activities',
        PLACES       = '/places',
        STORYLINE    = '/storyline'
    ;

    private $accessToken;


    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }


    public function getSummary()
    {
        $url = self::BASE_URL . self::SUMMARY . '/daily/20150220';
        return $this->getApiResponse($url);
    }


    public function getActivities()
    {
        $url = self::BASE_URL . self::ACTIVITIES . '/daily/20150220';
        return $this->getApiResponse($url);
    }


    public function getPlaces()
    {
        $url = self::BASE_URL . self::PLACES . '/daily/20150220';
        return $this->getApiResponse($url);
    }


    public function getStoryline($trackPoints = false)
    {
        $url = self::BASE_URL . self::STORYLINE . '/daily/20150220';
        $params = [
            'trackPoints' => $trackPoints,
        ];
        return $this->getApiResponse($url, $params);
    }


    private function getApiResponse($url, array $params = [])
    {
        $url = $url . '?access_token=' . $this->accessToken;
        foreach ($params as $key => $val) {
            $val = $val === true ? 'true' : 'false';
            $url .= "&{$key}={$val}";
        }
    	return json_decode(@file_get_contents($url));
    }


}
