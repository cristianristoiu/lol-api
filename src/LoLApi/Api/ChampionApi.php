<?php

namespace LoLApi\Api;

use LoLApi\Result\ApiResult;

/**
 * Class ChampionApi
 *
 * @package LoLApi\Api
 * @see     https://developer.riotgames.com/api/methods
 */
class ChampionApi extends BaseApi
{
    const API_URL_CHAMPIONS_ALL = '/api/lol/{region}/v1.2/champion';
    const API_URL_CHAMPION_BY_ID = '/api/lol/{region}/v1.2/champion/{championId}';

    /**
     * @param bool $onlyFreeToPlay
     *
     * @return ApiResult
     */
    public function getAllChampions($onlyFreeToPlay = false)
    {
        // The json_encode trick is here to change the boolean to a string representation of the boolean
        return $this->callApiUrl(self::API_URL_CHAMPIONS_ALL, ['freeToPlay' => json_encode($onlyFreeToPlay)]);
    }

    /**
     * @param int $championId
     *
     * @return ApiResult
     */
    public function getChampionById($championId)
    {
        $url = str_replace('{championId}', $championId, self::API_URL_CHAMPION_BY_ID);

        return $this->callApiUrl($url, []);
    }
}
