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


    public function getSummary($day = null)
    {
        $url = $this->generateUrl($day, self::SUMMARY);
        return $this->getApiResponse($url);
    }


    public function getActivities($day = null)
    {
        $url = self::BASE_URL . self::ACTIVITIES . "/daily/{$day}";
        return $this->getApiResponse($url);
    }


    public function getPlaces($day = null)
    {
        $url = self::BASE_URL . self::PLACES . "/daily/{$day}";
        return $this->getApiResponse($url);
    }


    public function getStoryline($day = null, $trackPoints = false)
    {
        $url = $this->generateUrl($day, self::STORYLINE);
        $params = [
            'trackPoints' => $trackPoints,
        ];
        return $this->getApiResponse($url, $params);
    }


    private function generateUrl($day = null, $url)
    {
        if ($day === null) $day = date('Ymd');
        return self::BASE_URL . $url . "/daily/{$day}";
    }


    private function getApiResponse($url, array $params = [])
    {
        $url = $url . '?access_token=' . $this->accessToken;
        foreach ($params as $key => $val) {
            $val = $val === true ? 'true' : 'false';
            $url .= "&{$key}={$val}";
        }
        echo("<pre>");var_dump($url);echo("<pre>");
    	return json_decode(@file_get_contents($url));
    }


}
