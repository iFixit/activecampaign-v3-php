<?php

namespace Mediatoolkit\ActiveCampaign\Campaigns;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Campaigns
 * @package Mediatoolkit\ActiveCampaign\Campaigns
 * @see https://developers.activecampaign.com/reference#test-1
 */
class Campaigns extends Resource
{

    /**
     * List all contacts
     * @see https://developers.activecampaign.com/reference#list-all-campaigns
     *
     * @param array $query_params
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public function listAll(array $query_params = [], int $limit = 20, int $offset = 0)
    {
        $query_params = array_merge($query_params, [
            'limit' => $limit,
            'offset' => $offset
        ]);

        $req = $this->client
            ->getClient()
            ->get('/api/3/campaigns', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Get Message from CampaignMessage
     * @see https://developers.activecampaign.com/reference#retrieve-a-campaign
     *
     * @param int $campaignMsgid
     * @return string
     */
    public function getMessage(int $campaignMsgid)
    {
        $req = $this->client
            ->getClient()
            ->get("/api/3/campaignMessages/{$campaignMsgid}/message");

        return $req->getBody()->getContents();
    }

    /**
    * Get CampaignMessage Object
    * @param int $campaignid
    * @return string
    */
    public function getCampaignMessage(int $campaignid)
    {
        $req = $this->client
        ->getClient()
        ->get("/api/3/campaigns/{$campaignid}/campaignMessage");

        return $req->getBody()->getContents();
    }
}
